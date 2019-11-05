    let signBtn = $('#signBtn');
    let logBtn = $('#logBtn');
    let logForm = $('#logIn');
    let signForm = $('#signUp');

    logForm.hide();

    signBtn.click(function(){
        logForm.hide();
        signForm.show();
        signBtn.addClass("active");
        logBtn.removeClass("active");
    });

    logBtn.click(function(){
        logForm.show();
        signForm.hide();
        signBtn.removeClass("active");
        logBtn.addClass("active");
    });