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
    patientsBtn.addClass("active");
    notificationsBtn.removeClass("active");
    addPatientBtn.removeClass("active");
});

notificationsBtn.click(function(){
    hideArticles(patientsForm, addPatientForm, notificationsForm);
    notificationsBtn.addClass("active");
    patientsBtn.removeClass("active");
    addPatientBtn.removeClass("active");
});

addPatientBtn.click(function(){
    hideArticles(notificationsForm, patientsForm, addPatientForm);
    addPatientBtn.addClass("active");
    notificationsBtn.removeClass("active");
    patientsBtn.removeClass("active");
});

function hideArticles(hide1, hide2, show){
    hide1.hide();
    hide2.hide();
    show.show();
}


$('#genderSelect').change(function(){
    $('#genderPlaceHolder').hide();
});


$('#diagnosticSearcher').keyup(function(e){
    let txt = $(this).val();
    let cieList = $('#diagnostics');
    let selectedDiagnostics = $('#cieList');
    let templateDiagnostic = "";

    let deleteDiagnostic;



if(txt.length >= 3){
    $.ajax({
        url:"listCie10.php",
        method:"post",
        data:{search:txt},
        dataType:"text",
        success:function(data){
            let diagnostics = JSON.parse(data);
            let template = "";
        template += `<option value="">Seleccione el Diagnóstico</option>`;
            diagnostics.forEach(diagnostic =>{
                template += `<option class="diag"> <b> ${diagnostic.code} <b/> - <span>${diagnostic.tag}</span></option>`;
            })
            cieList.html(template);
            diag = $('.diag');

            cieList.change(function(){
                if($(this).val() != ""){
                    templateDiagnostic += `<tr>`
                    templateDiagnostic += `<td>${$(this).val()}<input type='hidden' name='diagnostics[]' value='${$(this).val()}'/></td>`;
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
    options+=`<option value="">Día</option>`;
    for(let i=1; i <= daysCount; i++){
        options+=`<option value="${i}">${i}</option>`;
    }
    days.html(options);
});


