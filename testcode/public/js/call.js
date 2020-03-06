const pathname = window.location.pathname; // Returns path only (/path/example.html)
const url = pathname.replace("/index/", "/");
let list=false;
$( document ).ready(function() {
    $("#Greetings").html("THE RICK AND MORTY API");
    $("#seachInput").on('keyup', function() {
        var letter ="word="+ $(this).val();
        if($(this).val()==undefined ||$(this).val()=="" ) {
            getUrl(url,null,(error,response)=>{
                searchContent(response);
            });
        }else{
            getUrl(url+'/search/' + letter, letter, (error, response) => {
                searchContent(response);
            });
        }
    });
    $("#btnSch").click(function(){
        var letter ="word="+ $("#seachInput").val();
        getUrl(url+'/search/'+letter,letter,(error,response)=>{
            searchContent(response);
        });

    });
    $("#inpList").on('change', function() {
        if ($(this).is(':checked')) {
            list=true;
            getUrl(url,null,(error,response)=>{
                searchContent(response);
            });
        }
        else{
            list=false;
        }
    });
    getUrl(url,null,(error,response)=>{
            searchContent(response);
    });
});
function searchContent(response){
    const $content = $('<div id="Cards" class="">');
    let data = JSON.parse(response)
    $content.loadLibrary(data);
}
function getUrl(URL,params,callback){
    const promise = $.ajax({
        data:params,
        url: URL,
        type:'post',
        crossDomain: true,
        error: function (jqXHR, status, error) {
            //console.log( 'Excuse me, there was a problem' ) ;
            callback(error, null);
        },
        // code to execute regardless of whether the request failed or did not
        complete: function (jqXHR, status) {
            //console.log( 'Request made' ) ;
        }
    });
    //success:
    promise.done(readApi);
    function readApi(response){
        callback(null, response);
    }
}
(function ( $ ) {
    $.fn.loadLibrary=function(elements){
        $("#resultsDiv").remove();
        if(list==true) $("#Cards").append('<ul id="resultsDiv" class="collection">');
        else $("#Cards").append('<div id="resultsDiv" class="col s12">');
        return  this .fadeIn ("slow",function () {
            $.each( elements.results,function(i,element) {
                if(list==true){
                    $("#resultsDiv").append($(`<li id="div${i}" class="collection-item avatar">`));
                    switch (url) {
                        case '/episode':
                            $('#div' + i).append(
                                $(`<i id="img${i}" class="material-icons circle">folder</i>`));
                            break;
                        case '/character':
                            $('#div' + i).append(
                                $(`<img id="img${i}" src="${element.image}" alt="" class="circle">`));
                            break;
                        case '/location':
                            $('#div' + i).append(
                                $(`<i class="material-icons circle" id="img${i}">location_searching</i>`));
                            break;
                    }
                    $('#div' + i) .append(
                        $(`<span class="title" id="divContent${i}">`),
                        $(`<p id="divTabs${i}">`),
                        $(`<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>`)
                    );
                    $('#divContent'+i).append(
                          `${element.name}`);
                     $('#divTabs'+i).append(
                        `${element.created}<br>`);

                }else{
                // console.log(i);
                $("#resultsDiv").append($(`<div id="div${i}" class="card">`));
                $('#div' + i).append(
                        $(`<div class="card-image waves-effect waves-block waves-light" id="img${i}"></div>`),
                        $(`<div class="card-content" id="divContent${i}">`),
                        $(`<div class="card-tabs" id="divTabs${i}">`),
                );
                $('#divContent'+i).append(
                    $(`<h5 class="card-title">${element.name}</h4>`),
                    $(`<div class="caption" id="caption${i}"></div>`));
                switch (url) {
                    case '/episode':
                        $('#caption'+i).append(
                            $(`<p>${element.episode}</p>`));
                        break;
                    case '/character':
                        $('#img' + i).append(
                            $(`<img id="img${i}" src="${element.image}" alt="" class="circle">`));
                        break;
                    case '/location':
                        break;
                }
                $('#caption'+i).append(
                    $(`<p>${element.created}</p>`));
                }
            });
        });
    }
    $.fn.loadImages=function(characters,i){
        $('#img'+i).append(
            $.each( characters,function(i,element) {
                $(`<img class="" src="${element.image}">`);
            })
        );

    }
}) ( jQuery );
