jQuery(document).ready(function($){
    noCaptcha = $('#CaptchaSettings').clone();
    noCaptcha.hide();
    noCaptcha.attr('id','NoCaptcha');
    noCaptcha.find('.Info').html(gdn.definition('NoCaptchaSettingsTxt'));
    $('#CaptchaSettings').after(noCaptcha);
    
    $('#RegistrationMethods input[name="Garden-dot-Registration-dot-Method"]').change(function(){
        if($(this).val()=='NoCaptcha' && $(this).is(':checked'))
            $('#NoCaptcha').css({'display':'list-item'});
        else
            $('#NoCaptcha').hide();
    }).trigger('change');
});
