let patientsBtn = $('#patientsBtn');
let notificationsBtn = $('#notificationsBtn');
let addPatientBtn = $('#addPatientBtn');

let patientsForm = $('#patients');
let notificationsForm = $('#notifications');
let addPatientForm = $('#addPatient');

let diagnosticList = $('#diagnostic');

patientsForm.show();
notificationsForm.hide();
addPatientForm.hide();

patientsBtn.click(function(){
    hideArticles(notificationsForm, addPatientForm, patientsForm);
    activeButtons(patientsBtn, notificationsBtn, addPatientBtn);
});

notificationsBtn.click(function(){
    hideArticles(patientsForm, addPatientForm, notificationsForm);
    activeButtons(notificationsBtn, patientsBtn, addPatientBtn);
});

addPatientBtn.click(function(){
    hideArticles(notificationsForm, patientsForm, addPatientForm);
    activeButtons(addPatientBtn, notificationsBtn, patientsBtn);
});

function hideArticles(hide1, hide2, show){
    hide1.hide();
    hide2.hide();
    show.show();
}
function activeButtons(btn1, btn2, btn3){
    btn1.addClass("active");
    btn2.removeClass("active");
    btn3.removeClass("active");
}



// $('#genderSelect').change(function(){
//     $('#genderPlaceHolder').hide();
// });
let cieList = $('#diagnostics');
cieList.hide();
let buttonArrow = false;

$('#diagnosticSearcher').keyup(function(e){
    let txt = $(this).val();
    cieList = $('#diagnostics');
    let selectedDiagnostics = $('#cieList');
    let templateDiagnostic = selectedDiagnostics.html();
    let deleteDiagnostic;
    let buttonDropbox = $('#buttonDropbox');
    
   

    

    if(txt.length >= 3){
        $.ajax({
            url:"listCie10.php",
            method:"post",
            data:{search:txt},
            dataType:"text",
            success:function(data){
                let diagnostics = JSON.parse(data);
                let template = "";
                // template += `<option value="">Seleccione el Diagnóstico</option>`;
                diagnostics.forEach(diagnostic =>{
                    if(diagnostic.code != "No")
                        template += `<li class="diag"> <b> ${diagnostic.code} <b/> || <span>${diagnostic.tag}</span></li>`;
                    else   
                        template +=`<li class="">No se encontraron diagnósticos</li>`;
            })
            cieList.html(template);
            diag = $('.diag');

            // diag.click(function(){
            //     console.log($(this).text());
            // });

            diag.click(function(){
                if($(this).text() != ""){
                    templateDiagnostic += `<tr>`
                    templateDiagnostic += `<td>${$(this).text()}<input type='hidden' name='diagnostics[]' value='${$(this).text()}'/></td>`;
                    templateDiagnostic += `<td><div class="deleteDiagnostic">BORRAR</div></td>`;
                    templateDiagnostic += `</tr>`;
                }
                
                selectedDiagnostics.html(templateDiagnostic);
                deleteDiagnostic = $('.deleteDiagnostic');

                deleteDiagnostic.click(function(){
                    console.log($(this).parent().parent());
                    $(this).parent().parent().remove()
                    templateDiagnostic = selectedDiagnostics.html();
                });
            });
        }
    });
}
    // cieList.hide();
    buttonDropbox.off('click').click(function(){
        buttonArrow = !buttonArrow;
        let newDirection = (buttonArrow) ? `<i class="fas fa-angle-up"></i>` :  `<i class="fas fa-angle-down"></i>`;
        buttonDropbox.html(`Seleccione el Diagnóstico ${newDirection}`);
        cieList.slideToggle();
    });
});



let days = $('#birthDay');
let months = $('#birthMonth');
let years = $('#birthYear');
let birthSelector = $('.selectBirth');

function daysInMonth(month, year) { 
    return new Date(year, month, 0).getDate(); 
} 

birthSelector.change(function(){
    let daysCount = daysInMonth(months.val(), years.val());
    let options = ``;
    // options+=`<option class="selectDefault" value="">Día</option>`;
    for(let i=1; i <= daysCount; i++){
        options+=`<option value="${i}">${i}</option>`;
    }
    days.html(options);
});

let selectDefault = $('.selectDefault');

selectDefault.parent().change(function(){
    $(this).children('.selectDefault').remove();
});


let sameAdressBtn = $('#sameAdress');
sameAdressBtn.click(function(){
    // $("input[value='streetNameContact']").text($("input[value='streetName']").text());

    $('#streetNameContact').val($('#streetName').val());
    $('#streetNumberContact').val($('#streetNumber').val());
    $('#departamentNumberContact').val($('#departamentNumber').val());
    $('#floorNumberContact').val($('#floorNumber').val());
    $('#postalCodeContact').val($('#postalCode').val());
    $('#cityContact').val($('#city').val());
    $('#stateContact').val($('#state').val());
    $('#countryContact').val($('#country').val());

});



