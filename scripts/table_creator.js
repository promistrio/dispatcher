/**
 * Created by VLAD on 10.02.2018.
 */


class Table {

    constructor(headers, object_name) {
        this.object = object_name;
        this.headers = headers;
        this.rows = [];
        var result = "";


        var result = "<table class='table no-m'>" +
            "<thead>" +
            "<tr>";

        headers.forEach(function(item, i, headers){
            result += "<th class='col-md-1'>" + item + "</th>";
        });

        this.head = result;

        result += "</tr>" +
            "</thead>" +
            "<tbody>";

        result += "</tbody></table>" ;

        this.refresh();
    }

    refresh(){
        var result = "";

        var result = "<table class='table no-m'>" +
            "<thead>" +
            "<tr>";

        this.headers.forEach(function(item, i, headers){
            result += "<th class='col-md-1'>" + item + "</th>";
        });


        result += "</tr>" +
            "</thead>" +
            "<tbody>";



        var rows = this.rows;
        rows.forEach(function (item, i, rows){
            result += "<tr>";
            item.forEach(function (it, j, item) {
                result += " <td> <span class='pd-l-sm'></span><a id='vehicle_id' onclick='setFocus(" + i +")'>" + it +  " </a> </td>";
            });
            result += "</tr>";
        });


        result += "</tbody></table>" ;
        document.getElementById(this.object).innerHTML = result;
    }
    appendRows(array){
        /*if (array.length != this.headers.length){
            console.log("length of array differ");
        }*/
        this.rows.push(array);

        this.refresh();
    }
    clearRows(){
        this.rows = [];
    }
}

