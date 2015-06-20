// removeoffers.js
//
// Send ajax request to API server for removing/deactivating a user's offer,
// dynamically removes the offer from the profile page and decrements the
// shown offer count. Contains handler for fading of offer delete buttons.

$(function(){

    // Fade delete offer buttons
    $(document)
        .on("mouseenter", ".offerRow", function() {
            $(this).find(".deleteOfferBtn").fadeTo(200, 1);})
        .on("mouseleave", ".offerRow", function() {
             $(this).find(".deleteOfferBtn").fadeTo(0, 0);
    });

    // Delete offer button handler
    $(document).on("click", "button.deleteOfferBtn", function(e){
        e.preventDefault();
        if(confirm($(this).attr("name") + " verwijderen uit je vakkenlijst?")){
            var offerId = $(this).attr("value");
            $.ajax({
                url: "ajax/offer.php",
                type: "POST",
                data: {"action": "delete", "offer_id": offerId}})
                .done(function(data, status) {
                    if(data == "ok") {
                        $("#offerRow_" + offerId).remove();
                        $("#numOffers").text(parseInt($("#numOffers").text()) - 1);
                    }
                });
         }
    });

});
