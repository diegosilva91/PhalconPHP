$( document ).ready(function() {
    $("#Greetings").html("THE RICK AND MORTY API");
    // HEY, DID YOU EVER WANT TO HOLD A TERRY FOLD?
    // I GOT ONE RIGHT HERE, GRAB MY TERRY FLAP
    var $content=$('<div id="Cards" class="">');
    getUrl('/episode',(error,response)=>{
        // console.log(JSON.parse(data));
        // loadCards(data,defaultLibrary);
        data=JSON.parse(response)
        $content.loadLibrary(data);
        $.each( data.results,function(i,element) {
            $.each(element.characters,function(i,element) {
                numberEpisode=element.match(/(\d+)/)[0];
                URL="/character/"+numberEpisode;
                console.log(URL);
            //     getUrl(URL(error,response)=>{
            // //         // console.log(response);
            // //         // $content.loadImages(response.results,i); PHP
            // //         $content.loadImages(response,i);
            //     });
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

        $("#Cards").append('<div id="resultsDiv" class="row">');
        return  this .fadeIn ("slow",function () {
            $.each( episodes.results,function(i,element) {
                // console.log(i);
                $("#resultsDiv").append($(`<div id="div${i}" class="card blue-grey darken-1 col s4">`));
                $('#div' + i).append(
                        $(`<div class="card-image waves-effect waves-block waves-light" id="img${i}"></div>`),
                        $(`<div class="card-content white-text" id="divContent${i}">`),
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
            $(`<img class="g-top" src="${characters.image}">`)
        );

    }
}) ( jQuery );
