/**
 * Created by Владислав Буздин on 15.01.2018.
 */

/* TO DO
2  Не обновлять все, а добавлять новые точки,
1.1 Реализовать возможность добавления беспилотника, его типа. Клиенту отдавать какую-нибудь рандомную строку-пароль
?Нужно ли переключение: отбржать треки, отображать трек только самолета

 сделать последний выход на связь
 - НСУ Отправляет команду обрыв
 - Обрыв по времени

 */

var colors = ["green", "yellow", "red"];

var map;
var drawingManager;
var selectedShape;
var shapes = [];
var lines = [];
var markers = [];
var table = [];
var infowindow = [];
var refreshTracks;
var focus_id = -1;
var heights = [];
var addresses = [];
var tableShapes = new Table (["ID", "Исполнитель", "Площадь", "Высота"], "table_polygons");

function initMap() {

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: new google.maps.LatLng(59, 30),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var polyOptions = {
        strokeWeight: 0,
        fillOpacity: 0.45,
        editable: true,
        draggable: true
    };

    drawingManager = new google.maps.drawing.DrawingManager({
//        drawingMode: google.maps.drawing.OverlayType.POLYGON,
        markerOptions: {
            draggable: true
        },
        polylineOptions: {
            editable: true,
            draggable: true
        },

        drawingControl: true,
        drawingControlOptions: {
            position: google.maps.ControlPosition.Top_Center,
            drawingModes: [
                google.maps.drawing.OverlayType.POLYGON,
            ]
        },

        rectangleOptions: polyOptions,
        circleOptions: polyOptions,
        polygonOptions: polyOptions,
        map: map
    });



    google.maps.event.addListener(drawingManager, 'overlaycomplete', function (e) {


        if (e.type !== google.maps.drawing.OverlayType.MARKER) {
            // Switch back to non-drawing mode after drawing a shape.
            drawingManager.setDrawingMode(null);
            // Add an event listener that selects the newly-drawn shape when the user
            // mouses down on it.
            shapes.push(e.overlay);
            last = shapes.length - 1;
            shapes[last].type = e.type;

            object = {};
            object["name"] = "Ботенко Игорь";
            object["height"] = 500;
            object["coordinates"] = [];

            var vertices = shapes[last].getPath();

            for (var i =0; i < vertices.getLength(); i++) {
                var xy = vertices.getAt(i);
                object["coordinates"].push({ "lat" : xy.lat(), "lng": xy.lng() });
            }
            sendShape(object);

            google.maps.event.addListener(shapes[last], 'insert_at', function() {
                console.log('Vertex removed from inner path.');
            });

            google.maps.event.addListener(shapes[last], 'click', function (e) {
                if (e.vertex !== undefined) {
                    if (shapes[last].type === google.maps.drawing.OverlayType.POLYGON) {
                        var path = shapes[last].getPaths().getAt(e.path);
                        path.removeAt(e.vertex);
                        if (path.length < 3) {
                            shapes[last].setMap(null);
                        }
                    }
                    if (shapes[last].type === google.maps.drawing.OverlayType.POLYLINE) {
                        var path = newShape.getPath();
                        path.removeAt(e.vertex);
                        if (path.length < 2) {
                            shapes[last].setMap(null);
                        }
                    }
                }
                setSelection(shapes[last]);
            });

            google.maps.event.addListener(shapes[last], 'rightclick', function(e) {
                // Check if click was on a vertex control point
                console.log("Hello");
                /*if (e.vertex == undefined) {
                 return;
                 }
                 deleteMenu.open(map, flightPath.getPath(), e.vertex);*/
            });

            setSelection(shapes[last]);
        }
    });

    function setSelection (shape) {
        //clearSelection();
        selectedShape = shape;
        shape.setEditable(true);
        selectColor(shape.get('fillColor') || shape.get('strokeColor'));
        vertices = shape.getPath();
        contentString = "Точки: ";
        for (var i =0; i < vertices.getLength(); i++) {
            var xy = vertices.getAt(i);
            contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' +
                xy.lng();
        }
        console.log(contentString);
    }

    function selectColor (color) {
        selectedColor = color;
        /*for (var i = 0; i < colors.length; ++i) {
            var currColor = colors[i];
            colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
        }*/
        // Retrieves the current options from the drawing manager and replaces the
        // stroke or fill color as appropriate.
        var polylineOptions = drawingManager.get('polylineOptions');
        polylineOptions.strokeColor = color;
        drawingManager.set('polylineOptions', polylineOptions);
        var rectangleOptions = drawingManager.get('rectangleOptions');
        rectangleOptions.fillColor = color;
        drawingManager.set('rectangleOptions', rectangleOptions);
        var circleOptions = drawingManager.get('circleOptions');
        circleOptions.fillColor = color;
        drawingManager.set('circleOptions', circleOptions);
        var polygonOptions = drawingManager.get('polygonOptions');
        polygonOptions.fillColor = color;
        drawingManager.set('polygonOptions', polygonOptions);
    }



    refreshTracks = function () {


        console.log(dropdownOptions);
        var append = "";
        for(var i = 0; i < dropdownOptions.length; i++){
            append += dropdownOptions[i] + "=true&";
        }

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'php/refresh.php?' + append, true);

        console.log('php/refresh.php?' + append);

        xhr.send();

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4) return;

            if (xhr.status != 200) {
                alert(xhr.status + ': ' + xhr.statusText);

            } else {
                var json = JSON.parse(this.responseText);
                removeLines();

                refreshAll(json);
                refreshTable(json);
            }
        };
    };

    refreshPhoto()

    function refreshPhoto() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'php/refresh_photo.php', true);
        xhr.send();

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4) return;

            if (xhr.status != 200) {
                alert(xhr.status + ': ' + xhr.statusText);

            } else {
                var json = JSON.parse(this.responseText);

                var txt = "";
                json.forEach(function (item, i, json) {
                    pos = new google.maps.LatLng({lat: item.lat * 1.0, lng: item.lng * 1.0});
                    txt += "<img src = 'photo/" + item.id + ".jpg'><br>";
                    console.log(1);
                });

                document.getElementById("list_photo").innerHTML = txt;
            }
        }

    }

    refreshAddress();
    function refreshAddress(){

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'php/refresh_address.php', true);
        xhr.send();

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4) return;

            if (xhr.status != 200) {
                alert(xhr.status + ': ' + xhr.statusText);

            } else {
                var json = JSON.parse(this.responseText);

                addresses.forEach(function (item, i, addresses) {
                    item.setMap(null);
                });
                addresses = [];

                json.forEach(function (item, i, json) {
                    pos = new google.maps.LatLng({lat: item.lat * 1.0, lng: item.lng * 1.0});

                    var pinColor = "FE7569";
                    var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
                        new google.maps.Size(21, 34),
                        new google.maps.Point(0,0),
                        new google.maps.Point(10, 34));

                    var markerIcon = {
                        url: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|' + pinColor,
                        scaledSize: new google.maps.Size(0, 0),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(0,0),
                        labelOrigin: new google.maps.Point(1,1)
                    };

                    addresses.push (new google.maps.Marker({
                        position: pos,
                        map: map,
                        icon: markerIcon,
                        label:{
                            text: item.address,
                            color: "#eb3a44",
                            fontSize: "16px",
                            fontWeight: "bold"
                        }
                    }));
                });
            }
        }
    }

    refreshPoly = function () {

        console.log(dropdownOptions);

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'php/get_polygons.php', true);
        xhr.send();

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4) return;

            if (xhr.status != 200) {
                alert(xhr.status + ': ' + xhr.statusText);

            } else {
                //alert(this.responseText);
                var json = JSON.parse(this.responseText);


                json.forEach(function (item, i, json) { // создать заполнитель
                    var coordinates =  item.coordinates;
                    tableShapes.appendRows([item["id"], item['name'], "NaN", item['height']]);
                    var temp = [];

                    coordinates.forEach(function (item, j, coordinates){
                        temp.push({lat : item.lat * 1.0, lng : item.lng * 1.0});
                    });

                    shapes.push(new google.maps.Polygon({ // создать создаватель
                        paths: temp,
                        editable: true
                    }));

                    temp = [];

                    var last = shapes.length - 1;
                    shapes[last].setMap(map);

                    google.maps.event.addListener(shapes[last], 'click', function (e) {
                        if (e.vertex !== undefined) {
                            if (shapes[last].type === google.maps.drawing.OverlayType.POLYGON) {
                                var path = shapes[last].getPaths().getAt(e.path);
                                path.removeAt(e.vertex);
                                if (path.length < 3) {
                                    shapes[last].setMap(null);
                                }
                            }
                            if (shapes[last].type === google.maps.drawing.OverlayType.POLYLINE) {
                                var path = newShape.getPath();
                                path.removeAt(e.vertex);
                                if (path.length < 2) {
                                    shapes[last].setMap(null);
                                }
                            }
                        }
                        setSelection(shapes[last]);
                    });

                    google.maps.event.addListener(shapes[last], 'rightclick', function(e) {
                        // Check if click was on a vertex control point
                        console.log("Hello");
                        /*if (e.vertex == undefined) {
                         return;
                         }
                         deleteMenu.open(map, flightPath.getPath(), e.vertex);*/
                    });
                });
            }
        }
    };


    refreshTracks();
    setInterval(refreshTracks, 3000);
    setInterval(refreshAddress, 3000);

    function removeLines(){
        lines.forEach(function (item, i, lines) {
            item.setMap(null);
        });
        markers.forEach(function (item, i, lines) {
            item.setMap(null);
        });
        heights.forEach(function (item, i, lines) {
            item.setMap(null);
        });
        infowindow = [];
        lines = [];
        markers = [];
        table = [];
        heights = [];

    }

    function drawTrack(coordinates, color){
        var temp = [];

        var last_status = -1 ;
        var last_point = false;

        var pos = 0;

        var markerImage = new google.maps.MarkerImage(
            'images/1px.png',
            new google.maps.Size(1,1),
            new google.maps.Point(1,1),
            new google.maps.Point(1,1)
        );

        coordinates.forEach(function (item, i, coordinates) {
            if ( last_status != item.cloud || i === coordinates.length - 1 ){
                //console.log( " Всего точек:  " + temp.length + " Красим в " +  colors[item.cloud]);
                //console.log(item.cloud + " " + i);
                lines.push(new google.maps.Polyline({
                    path: temp,
                    geodesic: true,
                    strokeColor: colors[last_status], // разрывы + добавить тернарную операцию на проверку разведчика погоды
                    strokeOpacity: 1.0,
                    strokeWeight: 2
                }));
                last_status = item.cloud;
                lines[lines.length-1].setMap(map);



                if (!((i == coordinates.length - 1) || (i == 0)))
                heights.push( new google.maps.Marker({
                    position: {lat : item.lat * 1.0, lng: item.lng * 1.0 },
                    //content: + item.alt,
                    icon: markerImage,
                    label: {text: item.alt, color: "green"},
                    map: map
                }));

                temp = [];
            }

            temp.push({lat : item.lat * 1.0, lng : item.lng * 1.0});

            if (i === coordinates.length - 1){
                pos = new google.maps.LatLng( {lat : item.lat * 1.0, lng: item.lng * 1.0 } )
            }

        });

        /*lines.push(new google.maps.Polyline({
            path: temp,
            geodesic: true,
            strokeColor: colors, // осталось поменять цвет
            strokeOpacity: 1.0,
            strokeWeight: 2
        }));*/



        markers.push (new google.maps.Marker({
            position: pos,
            map: map
        }));
    }

    function refreshAll(json) {
        json.forEach(function (item, i, tracks) {
            if (focus_id == i)
                drawTrack(item.coordinates, "red");
            else
                drawTrack(item.coordinates, "gray");
            var last = item.coordinates.length - 1;

            var alt =  item.coordinates[last].alt;

            createInfoWindow(i, "<b>" + item.track_id+ "</b><br />" + Math.round(alt));
        });
    }

    // control kml layer

    var kml_layer = document.getElementById("kml_layer");

    kml_layer.addEventListener( 'change', function() {
        if(this.checked) {

            refreshPoly()

            drawingManager.setMap(map);

            shapes.forEach(function (item, j, shapes) {
                item.setMap(map);
            });

        } else {

            shapes.forEach(function (item, j, shapes) {
                item.setMap(null);
            });

            drawingManager.setMap(null);
        }
    });
}

function sendShape(object){
    var jsondata;
    var data = JSON.stringify(object);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/add_shape.php", !0);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.send(data);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // in case we reply back from server
            //alert(xhr.responseText);
            //jsondata = JSON.parse(xhr.responseText);
            //console.log(jsondata);
        }
    }
}


function create_kml(){

    var obj = [];

    shapes.forEach(function (item, j, shapes) {

        var vertices = item.getPath();
        var list = [];
        for (var i =0; i < vertices.getLength(); i++) {
            var xy = vertices.getAt(i);
            list.push ( {'lat' : xy.lat() , 'lon': xy.lng()});
        }

        obj.push({
            'id': j,
            'coordinates' : list
        });
        //item.setMap(null);
    });

    var data = JSON.stringify(obj);
    console.log(JSON.stringify(obj));

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/create_kml.php", !0);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.send(data);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // in case we reply back from server
            window.location="php/file.kml";
        }
    }
}

function createInfoWindow(marker_id, text){
    infowindow[marker_id] = new google.maps.InfoWindow({
        content: text,
        disableAutoPan: true
    });

    infowindow[marker_id].open(map, markers[marker_id]);
}




function refreshTable(json){
    var txt = "";
    txt += table_head;
    json.forEach(function (item, i, json){

        var id = item.track_id;
        var last = item.coordinates.length - 1;
        var alt = item.coordinates[last].alt;
        var speed = item.coordinates[last].speed;
        var date = item.coordinates[last].date;
        var prefix =item.coordinates[last].prefix;

        txt += "<tr> <td> <span class='pd-l-sm'></span><a id='vehicle_id' onclick='setFocus(" + i +")'>" + prefix + id + " </a> </td> " +

            "<td>" + alt +  "</td> " +

            "<td>" + speed + "</td> " +
            /*"<td><div class='progress progress-sm no-m'><div class='progress-bar progress-bar-success done' role='progressbar' aria-valuenow='40' aria-valuemin='0' aria-valuemax='100'style='width: 40%'> <span class='sr-only'>40% Complete (success)</span> " +*/

            "<td><button type='button' class='btn btn-default  btn-sm mr5' onclick='deleteTrack(" + id +")';> <i class='ti-trash'></i> </button>" +

            "<td>" + date + "</td> " +

            "</div> </div> </td> </tr>";
    });
    txt += "</table>";

    document.getElementById("table_with_param").innerHTML = txt;
}


function setFocus(id){
    map.setCenter(markers[id].getPosition());
    focus_id = id;
    lines[id].setOptions({strokeColor: 'red'});

}

function deleteTrack(id){

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'php/delete.php?id='+ id , true);
    xhr.send();

    xhr.onreadystatechange = function() {
        if (xhr.readyState != 4) return;

        if (xhr.status != 200) {
            alert(xhr.status + ': ' + xhr.statusText);

        } else {
            refreshTracks();
            //alert(this.responseText)
        }
    }

}

var table_head = "<table class='table no-m'>" +
    "<thead>" +
    "<tr>" +
    "<th class='col-md-1 pd-l-lg'>" +
    "<span class='pd-l-sm'></span>ID" +
    "</th>" +
    "<th class='col-md-1'>Alt</th>" +
    "<th class='col-md-1'>Speed</th>" +
    "<th class='col-md-1'>Control</th>" +
    "<th class='col-md-2'>В&nbspсети</th>" +
    "</tr>" +
    "</thead>" +
    "<tbody>";

var table_end = "</tbody></table>" ;