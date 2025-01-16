
(function ($, Drupal) {
    'use strict';

    $(document).ready(function () {

        let categoryColumns = {
            properties: [{data: 'property'}, {data: 'count'}, {data: 'sumcount'}],
            classes: [{data: 'class'}, {data: 'count'}],
            classesproperties: [{data: 'class'}, {data: 'property'}, {data: 'cnt_distinct_value'}, {data: 'cnt'}, {data: 'sumcount'}],
            topcollections: [{data: 'id'}, {data: 'title'}, {data: 'count'}, {data: 'max_relatives'}, {data: 'sum_size'}, {data: 'binary_size'}],
            formats: [{data: 'format'}, {data: 'count_format'}, {data: 'count_rawbinarysize'}, {data: 'sum_size'}],
            formatspercollection: [{data: 'id'}, {data: 'title'}, {data: 'type'}, {data: 'format'}, {data: 'count'}, {data: 'sum_size'}],
        };

        let key = $('#dashboard-detail-ajax-key').val();
        console.log("key ::::");
        console.log(key);
        console.log(categoryColumns[key]);


        //var fullUrl = window.location.href;
        //if (fullUrl.includes('/browser/dashboard/properties')) {
            console.log("inside url" + "/browser/dashboard-detail-api/" + key);
            var table = new DataTable('#dashboard-detail-ajax', {
                paging: true,
                destroy: true,
                searching: true,
                pageLength: 25,
                processing: true,
                bInfo: false, // Hide table information
                language: {
                    processing: "<img src='/browser/themes/contrib/arche-theme-bs/images/arche_logo_flip_47px.gif' />"
                },
                serverSide: true,
                serverMethod: "post",
                ajax: {
                    url: "/browser/dashboard-detail-api/" + key,
                    timeout: 600000,
                    complete: function (response) {
                        console.log("response ok");
                        console.log(response)
                       
                    },
                    error: function (xhr, status, error) {
                        console.log("properties  error");


                    }
                },
                columns: categoryColumns[key],
                fnDrawCallback: function () {
                }
            });

            /*$('#dashboard-detail-ajax').DataTable({
             paging: true,
             searching: true,
             pageLength: 10,
             processing: true,
             serverSide: true,
             responsive: true,
             bAutoWidth: false,
             ajax: {
             //ajax: "/browser/dashboard-detail-api/" + key,
             ajax: "/browserapi/publicationsDT/531127/en",
             type: 'POST',
             //timeout: 10000,
             complete: function (response) {
             console.log("DT OK" );
             console.log(response);
             },
             error: function (xhr, status, error) {
             console.log("DT ERROR" + error);
             console.log(status);
             console.log(xhr);
             }
             },
             //columns: categoryColumns[key]
            });*/
        //}

    });
})(jQuery, Drupal);

