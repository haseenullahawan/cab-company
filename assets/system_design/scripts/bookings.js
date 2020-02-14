// PICK UP FUNCTIONS

function showLocalPick() {
    $('#local_pick').show();
    $('#local_pick').attr('disabled', false);
    $('#pick_type').val('L');
    showPickLink('local');
    hideOthersPick('local');
}

function hideLocalPick() {
    $('#local_pick').hide();
    $('#local_pick').attr('disabled', true);
}

function showAirportPick() {
    $('#airport_pick').show();
    $('#airport_pick').attr('disabled', false);
    $('#pick_type').val('A');
    $('#airport_pick_flight').show();
    showPickLink('airport');
    hideOthersPick('airport');
}

function hideAirportPick() {
    $('#airport_pick').hide();
    $('#airport_pick_flight').hide();
    $('#airport_pick').attr('disabled', true);
}

function showTrainPick() {
    $('#train_pick').show();
    $('#train_pick').attr('disabled', false);
    $('#pick_type').val('T');
    $("#station_pick_train").show();
    showPickLink('train');
    hideOthersPick('train');
}

function hideTrainPick() {
    $('#train_pick').hide();
    $("#station_pick_train").hide();
    $('#train_pick').attr('disabled', true);
}

function showHotelPick() {
    $('#hotel_pick').show();
    $('#hotel_pick').attr('disabled', false);
    $('#pick_type').val('H');
    showPickLink('hotel');
    hideOthersPick('hotel');
}

function hideHotelPick() {
    $('#hotel_pick').hide();
    $('#hotel_pick').attr('disabled', true);
}

function showParkPick() {
    $('#park_pick').show();
    $('#park_pick').attr('disabled', false);
    $('#pick_type').val('P');
    showPickLink('park');
    hideOthersPick('park');
}

function hideParkPick() {
    $('#park_pick').hide();
    $('#park_pick').attr('disabled', true);
}

function showPickLink(pick_type) {
    if (pick_type == 'local') {
        $('#pick_local_link').hide();
        $('#pick_airport_link').show();
        $('#pick_train_link').show();
        $('#pick_hotel_link').show();
        $('#pick_park_link').show();
    }
    else if (pick_type == 'airport') {
        $('#pick_airport_link').hide();
        $('#pick_local_link').show();
        $('#pick_train_link').show();
        $('#pick_hotel_link').show();
        $('#pick_park_link').show();
    }
    else if (pick_type == 'train') {
        $('#pick_train_link').hide();
        $('#pick_airport_link').show();
        $('#pick_local_link').show();
        $('#pick_hotel_link').show();
        $('#pick_park_link').show();
    }
    else if (pick_type == 'hotel') {
        $('#pick_hotel_link').hide();
        $('#pick_airport_link').show();
        $('#pick_local_link').show();
        $('#pick_train_link').show();
        $('#pick_park_link').show();
    }
    else if (pick_type == 'park') {
        $('#pick_hotel_link').show();
        $('#pick_airport_link').show();
        $('#pick_local_link').show();
        $('#pick_train_link').show();
        $('#pick_park_link').hide();
    }
}

function hideOthersPick(pick_type) {
    if (pick_type == 'local') {
        hideAirportPick();
        hideTrainPick();
        hideHotelPick();
        hideParkPick();
    }
    else if (pick_type == 'airport') {
        hideLocalPick();
        hideTrainPick();
        hideHotelPick();
        hideParkPick();
    }
    else if (pick_type == 'train') {
        hideAirportPick();
        hideLocalPick();
        hideHotelPick();
        hideParkPick();
    }
    else if (pick_type == 'hotel') {
        hideAirportPick();
        hideLocalPick();
        hideTrainPick();
        hideParkPick();
    }
    else if (pick_type == 'park') {
        hideHotelPick();
        hideAirportPick();
        hideLocalPick();
        hideTrainPick();
    }
}

// DROP OF FUNCTIONS
function showLocalDrop(divID) {
    $('#local_drop_'+divID).show();
    $('#local_drop_'+divID).attr('disabled', false);
    $('#drop_type_'+divID).val('L');
    showDropLink('local',divID);
    hideOthersDrop('local',divID);
    if (divID == 2) {
        $(".drop2_address_label").show();
    }
}

function hideLocalDrop(divID) {
    if (divID == 2) {
        $(".drop2_address_label").hide();
    }
    $('#local_drop_'+divID).hide();
    $('#local_drop_'+divID).attr('disabled', true);
}

function showAirportDrop(divID) {
    $('#airport_drop_'+divID).show();
    $('#airport_drop_'+divID).attr('disabled', false);
    $('#drop_type_'+divID).val('A');
    $('#airport_drop_flight_'+divID).show();
    showDropLink('airport',divID);
    hideOthersDrop('airport',divID);
    if (divID == 2) {
        $(".drop2_airport_label").show();
    }
}

function hideAirportDrop(divID) {
    if (divID == 2) {
        $(".drop2_airport_label").hide();
    }
    $('#airport_drop_'+divID).hide();
    $('#airport_drop_flight_'+divID).hide();
    $('#airport_drop_'+divID).attr('disabled', true);
}

function showTrainDrop(divID) {
    $('#train_drop_'+divID).show();
    $('#train_drop_'+divID).attr('disabled', false);
    $('#drop_type_'+divID).val('T');
    $('#station_drop_train_'+divID).show();
    showDropLink('train',divID);
    hideOthersDrop('train',divID);
    if (divID == 2) {
        $(".drop2_train_label").show();
    }
}

function hideTrainDrop(divID) {
    if (divID == 2) {
        $(".drop2_train_label").hide();
    }
    $('#train_drop_'+divID).hide();
    $('#station_drop_train_'+divID).hide();
    $('#train_drop_'+divID).attr('disabled', true);
}

function showHotelDrop(divID) {
    $('#hotel_drop_'+divID).show();
    $('#hotel_drop_'+divID).attr('disabled', false);
    $('#drop_type_'+divID).val('H');
    showDropLink('hotel',divID);
    hideOthersDrop('hotel',divID);
    if (divID == 2) {
        $(".drop2_hotel_label").show();
    }
}

function hideHotelDrop(divID) {
    if (divID == 2) {
        $(".drop2_hotel_label").hide();
    }
    $('#hotel_drop_'+divID).hide();
    $('#hotel_drop_'+divID).attr('disabled', true);
}

function showParkDrop(divID) {
    $('#park_drop_'+divID).show();
    $('#park_drop_'+divID).attr('disabled', false);
    $('#drop_type_'+divID).val('P');
    showDropLink('park',divID);
    hideOthersDrop('park',divID);
    if (divID == 2) {
        $(".drop2_park_label").show();
    }
}

function hideParkDrop(divID) {
    if (divID == 2) {
        $(".drop2_park_label").hide();
    }
    $('#park_drop_'+divID).hide();
    $('#park_drop_'+divID).attr('disabled', true);
}

function showDropLink(drop_type,divID) {
    if (drop_type == 'local') {
        $('#drop_local_link_'+divID).hide();
        $('#drop_airport_link_'+divID).show();
        $('#drop_train_link_'+divID).show();
        $('#drop_hotel_link_'+divID).show();
        $('#drop_park_link_'+divID).show();
    }
    else if (drop_type == 'airport') {
        $('#drop_airport_link_'+divID).hide();
        $('#drop_local_link_'+divID).show();
        $('#drop_train_link_'+divID).show();
        $('#drop_hotel_link_'+divID).show();
        $('#drop_park_link_'+divID).show();
    }
    else if (drop_type == 'train') {
        $('#drop_train_link_'+divID).hide();
        $('#drop_airport_link_'+divID).show();
        $('#drop_local_link_'+divID).show();
        $('#drop_hotel_link_'+divID).show();
        $('#drop_park_link_'+divID).show();
    }
    else if (drop_type == 'hotel') {
        $('#drop_hotel_link_'+divID).hide();
        $('#drop_airport_link_'+divID).show();
        $('#drop_local_link_'+divID).show();
        $('#drop_train_link_'+divID).show();
        $('#drop_park_link_'+divID).show();
    }
    else if (drop_type == 'park') {
        $('#drop_hotel_link_'+divID).show();
        $('#drop_airport_link_'+divID).show();
        $('#drop_local_link_'+divID).show();
        $('#drop_train_link_'+divID).show();
        $('#drop_park_link_'+divID).hide();
    }
}

function hideOthersDrop(drop_type,divID) {
    if (drop_type == 'local') {
        hideAirportDrop(divID);
        hideTrainDrop(divID);
        hideHotelDrop(divID);
        hideParkDrop(divID);
    }
    else if (drop_type == 'airport') {
        hideLocalDrop(divID);
        hideTrainDrop(divID);
        hideHotelDrop(divID);
        hideParkDrop(divID);
    }
    else if (drop_type == 'train') {
        hideAirportDrop(divID);
        hideLocalDrop(divID);
        hideHotelDrop(divID);
        hideParkDrop(divID);
    }
    else if (drop_type == 'hotel') {
        hideAirportDrop(divID);
        hideLocalDrop(divID);
        hideTrainDrop(divID);
        hideParkDrop(divID);
    }
    else if (drop_type == 'park') {
        hideHotelDrop(divID);
        hideAirportDrop(divID);
        hideLocalDrop(divID);
        hideTrainDrop(divID);
    }
}