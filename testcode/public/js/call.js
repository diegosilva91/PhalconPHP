$( document ).ready(function() {
    $("#Greetings").html("THE RICK AND MORTY API");
    // HEY, DID YOU EVER WANT TO HOLD A TERRY FOLD?
    // I GOT ONE RIGHT HERE, GRAB MY TERRY FLAP
    var $content=$('<div id="Cards" class="row ">');
    getUrl('/list',(error,response)=>{
        // console.log(JSON.parse(data));
        // loadCards(data,defaultLibrary);
        data=JSON.parse(response)
        $content.loadLibrary(data);
        $.each( data.results,function(i,element) {
            $.each(element.characters,function(i,element) {
                getUrl(element,(error,response)=>{
                    // console.log(response);
                    // $content.loadImages(response.results,i); PHP
                    $content.loadImages(response,i);
                });
            });
        });
    });
});
function getUrl(URL,callback){
    var promise=$.ajax({
        url:URL,
        crossDomain: true,
        error :  function ( jqXHR , status , error )  {
            //console.log( 'Excuse me, there was a problem' ) ;
            callback(error, null);
        },
        // code to execute regardless of whether the reques	t failed or did not
        complete :  function ( jqXHR , status )  {
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

    $.fn.loadLibrary=function(episodes){

        $("#Cards").append('<div id="resultsDiv" class="d-flex flex-wrap col-12">');
        return  this .fadeIn ("slow",function () {
            $.each( episodes.results,function(i,element) {
                // console.log(i);
                $("#resultsDiv").append($(`<div id="div${i}" class="card col-xl-3 col-lg-4 col-md-6 col-xm-6">`));
                $('#div' + i).append(
                        $(`<div class="card-img-top" id="img${i}"></div>`),
                        $(`<div class="card-body" id="divContent${i}">`),
                );
                $('#divContent'+i).append(
                    $(`<h5>${element.name}</h4>`),
                    $(`<div class="caption" id="caption${i}"></div>`));
                $('#caption'+i).append(
                    $(`<p>${element.episode}</p>`),
                    $(`<p>${element.created}</p>`));
            });
        });
    }
    $.fn.loadImages=function(characters,i){
        $('#img'+i).append(
            $(`<img class="card-img-top" src="${characters.image}">`)
        );

    }
}) ( jQuery );
