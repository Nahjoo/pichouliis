$(document).ready(function () {
    $('#rotation_planche').val("");
    $('#rotation_serre').val("");
    $("#rotation_amount").val("");
    $("#preparation").val("");
    $("#recolte").val("");
    $("#couvert").val("");
    $('#bachage').val("");

    $('#zone').change(function() {
        if ($('select[id$="_zone"]>option:selected').text() == "Jardin" || $('select[id$="_zone"]>option:selected').text() == "Serre") {
            $('#planche').show();
            $("#rotation_planche").attr({'required' : true});
    
        }else {
            $('#planche').hide();
            $('#rotation_planche').val("");
            $("#rotation_planche").attr({'required' : false });
        }

        if ($('select[id$="_zone"]>option:selected').text() == "Serre" || $('select[id$="_zone"]>option:selected').text() == "Jardin"){
            $('#subarea ').show();
            $("#rotation_subarea").attr({'required' : true });
            
        }else {
            $('#subarea ').hide();
            $('#rotation_subarea').val("");
            $("#rotation_subarea").attr({'required' : false });
            
        }
    });

    $('#tache ').change(function() {
        if ($('select[id$="_tache"]>option:selected').text() == "Semis" || $('select[id$="_tache"]>option:selected').text() == "Rempotage" || $('select[id$="_tache"]>option:selected').text() == "Transplantation" || $('select[id$="_tache"]>option:selected').text() == "Récolte" ) {
            $('#amount').show();
            $("#rotation_amount").attr({'required' : true });
        }else {
            $('#amount').hide();
            $("#rotation_amount").val("");
            $("#rotation_amount").attr({'required' : false });
        }

       if ($('select[id$="_tache"]>option:selected').text() == "Préparation sol" ) {
            $('#preparation').show();
            $("#preparation").attr({'required' : true }, {'placeholder' : 'Selectionnez votre préparaion'});

        }else {
            $('#preparation').hide();
            $("#preparation").val("");
            $("#preparation").attr({'required' : false });
        }

        if ($('select[id$="_tache"]>option:selected').text() == "Récolte" ) {
            $('#recolte').show();
            $("#recolte").attr({'required' : true });

        }else {
            $('#recolte').hide();
            $("#recolte").val("");
            $("#recolte").attr({'required' : false });
        }

        if ($('select[id$="_tache"]>option:selected').text() == "Couvert" ) {
            $('#couvert').show();
            $("#couvert").attr({'required' : true });

        }else {
            $('#couvert').hide();
            $("#couvert").val("");
            $("#couvert").attr({'required' : false });
        }
   });

   $('#couvert ').change(function() {
        $('#bachage').show();
        if ($('select[id$="couvert"]>option:selected').val() == "Bachage") {
            $('#bachage').show();
            $("#bachage").attr({'required' : true });
        }else {
            $('#bachage').hide();
            $('#bachage').val("");
            $("#bachage").attr({'required' : false });
        }

    });
    
});

$(document).on('change', '#rotation_legume', function () {
    let $field = $(this)
    let $legumeField = $('#rotation_legume')
    let $form = $field.closest('form');
    // Les données à envoyer en Ajax
    let data = {}
    data[$legumeField.attr('name')] = $legumeField.val()
    data[$field.attr('name')] = $field.val()
    // On soumet les données
    $.post($form.attr('action'), data).then(function (data) {
        let $input = $(data).find('#rotation_variete')
        $('#rotation_variete').replaceWith($input)
    })
})


$(document).on('change', '#rotation_zone, #rotation_subarea', function () {
    let $field = $(this)
    let $zoneField = $('#rotation_zone')
    let $form = $field.closest('form')
    let target = '#' + $field.attr('id').replace('subarea', 'planche').replace('zone', 'subarea')
    // Les données à envoyer en Ajax
    let data = {}
    data[$zoneField.attr('name')] = $zoneField.val()
    data[$field.attr('name')] = $field.val()
    // On soumet les données
    $.post($form.attr('action'), data).then(function (data) {
      // On récupère le nouveau <select>
      let $input = $(data).find(target)
      // On remplace notre <select> actuel
      $(target).replaceWith($input)
    })
  })




