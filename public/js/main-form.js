(function($) {

    var form = $("#signup-form");
   
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
             element.before(error); 
        },
        rules: {
            name : {
                required: true,
            },
            email : {
                required: true,
            },
            phone : {
                required: true,
            },
          
           
        },
        onfocusout: function(element) {
            $(element).valid();
        },
        highlight : function(element, errorClass, validClass) {
            $(element.form).find('.actions').addClass('form-error');
            $(element).removeClass('valid');
            $(element).addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element.form).find('.actions').removeClass('form-error');
            $(element).removeClass('error');
            $(element).addClass('valid');
        }
    });
    var validatedStepOne = false;
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous : 'Previous',
            next : 'Next',
            finish : 'Finish',
            current : '',
        },
        //startIndex:1,
        titleTemplate : '<span class="title">#title#</span> ',
        onInit: function (event, current) {
            if (current >1) {
                
                $("#signup-form .actions a[href='#next']").hide();
               
            } else {
                
                $("#signup-form .actions a[href='#next']").show();
               
            }
           
        },
   

        onStepChanging: function (event, currentIndex, newIndex)
        {
           
            form.validate().settings.ignore = ":disabled,:hidden";
            
          
            if (newIndex >2) {
                
               $("#signup-form .actions a[href='#next']").hide();
                 $("#signup-form .actions a[href='#previous']").hide();
               
            } else{
                
                $("#signup-form .actions a[href='#next']").show();
                 $("#signup-form .actions a[href='#previous']").show();
               
            }
            
            if(initinex ==3){
                 $("#signup-form .actions a[href='#previous']").hide();
             return form.valid();
            }
            if(initinex ==2){
                 $("#signup-form .actions a[href='#previous']").hide();
                 $("#signup-form .actions a[href='#next']").hide();
             return form.valid();
            }
            
            if(currentIndex ==0 && newIndex== 1)
            {
                //return;
                
                if(!validatedStepOne){
                var name = $("#name").val();
                var regNo = $("#regNo").val();
                var address = $("#address").val();
                var email = $("#email").val();
                var phone = $("#phone").val();
                var msg = "";
                if(name==""){
                    msg+= "\n Name Cannot be Empty ";
                }
                if(address==""){
                    msg+= "\n Address Cannot be Empty ";
                }

                if(phone.length != 10){
                    msg+= "\n Please enter a valid Mobile number. ";
                }
                if(msg.length == 0){
                    $.ajax({
                        url: generateOTP,
                        type: 'POST',
                        data: {phone: phone,email:email,regNo:regNo,address:address,name:name,_token: csrftoken},
                        success: function(result){
                            if(result.status == 1){
                                $('#modal-box2').modal();
                                $("#modal-box2 button[name='validate']").on('click', function(){
                                var otp_code = $("input[name='otp_code']").val();
                              
                                $.ajax({
                                url: checkOTP,
                                type: 'POST',
                                data: {phone: phone, otp: otp_code, _token: csrftoken},
                                success: function(result){
                                  if(result.status == 1){
                                    $('#modal-box2').modal('toggle');
                                    validatedStepOne = true;
                                    form.steps('next');
                                   
                                 } else
                                 {
                                     $("#messg").remove();
                                      var text = '<p id="messg" name="messg" >Invalid SUM. <br> <strong>Please input the sum of numbers sent in Mobile and Email.</strong></p>';
                                    $('#modal-box2 .modal-body').append(text);
                                 }
                                }
                              }); 
                               
                              });
                             
                           } else
                           {
                                validatedStepOne = true;
                                form.steps('next');
                           }
                          }
                      });
                       
                }else
                {
                    alert(msg);
                    return;
                }
            
               return;
        
            }
            validatedStepOne = false;
            }

            if(currentIndex==0 && newIndex ==1)
            {
            //     $('#table1').find('tbody').empty();
    
                                     
            //     for(var i = 0; i < selectedCourses.length; i++) {
            //      $("#table1").append("<tr><td>"+(i+1)+"</td><td>"+selectedCourses[i].name+
            //      "</td><td>"+selectedCourses[i].subject_name+"</td><td>"+selectedCourses[i].session_name+
            //      "</td><td>"+selectedCourses[i].resources_person+"</td><td>"+selectedCourses[i].start_dt+"</td><td>"+selectedCourses[i].cost_per_sub+"</td><td>"+selectedCourses[i].remarks+
            //      "</td><td><a onclick='deleteSelected("+selectedCourses[i].id+")'><i class='ti-trash'></input></td></tr>");
            //      // <a  onclick='deleteSelected("+selectedCourses[i]+")'>Delete</a>
            //   }

            }
            if(currentIndex==1 && newIndex==2)
            {
                 if(initinex<2)
              {
                  if(!confirm("Are you sure to continue? Once you continue, you are not allowed to cancel or ask for refund of payment."))
                  {
                       $("#signup-form .actions a[href='#next']").show();
                 $("#signup-form .actions a[href='#previous']").show();
                      return;
                  }
              }
            }
            
            if( newIndex == 2){
                console.log('result');
               // alert(add_event_url );
               if(initinex<2){
                var allpaid = true;
                console.log("selected "+selectedCourses)
               for(var i = 0; i < selectedCourses.length; i++) {
                  console.log(selectedCourses[i].paid_status);
                if(typeof  selectedCourses[i].paid_status === 'undefined' || selectedCourses[i].paid_status == 0){
                    allpaid = false;
                }
              }
              if(allpaid)
              {
                  $("#signup-form .actions a[href='#next']").show();
                //   alert("Please select at least one course to enroll");
                 
                //   return;
              }else{
                $("#signup-form .actions a[href='#previous']").hide();
                $("#signup-form .actions a[href='#next']").hide();
              }
            }
             
              $('#trxn').empty();
                
                  
                    var name  = $('#name').val();
                    var regNo = $('#regNo').val();
                    var address = $('#address').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var courseids = $('#courseid').val();
                    $.ajax({
                      url: add_event_url ,
                      method: 'post',
                      data: {
                          "name": name,
                          "regNo": regNo,
                          "address": address,
                          "email": email,
                          "phone": phone,
                          "courseids" : courseids,
                         "_token": csrftoken,
                        },    
                      success: function(result){
 console.log("result");
                       console.log(result);
                     //   paybaki = result;
                        var total= 0.0;
                        var allunpaid = result.allunpaid;
                        
                        for(var i = 0; i < allunpaid.length; i++){
                            total+=parseFloat(allunpaid[i].payable_amount);
                        $("#trxn").append("<div class='item'><span class='price'>Rs. "+allunpaid[i].payable_amount+"</span><p class='item-name'>"+allunpaid[i].name+" - "+allunpaid[i].subject_name+"</p></div>");
                        
                    }
                    $("#trxn").append(" <div class='total'>Total<span class='price'>Rs. "+total+".00</span></div></div>");
                    
                    document.getElementById('tAmt').value=result.TXNAMT/100 ; 
                    document.getElementById('TOKEN').value= result.token ; 
                    document.getElementById('amt').value= result.TXNAMT/100; 
                    document.getElementById('TXNID').value= result.TXNID ; 
                    document.getElementById('pid').value= result.pid; 
                    document.getElementById('TXNDATE').value= result.TXNDATE ; 
                    document.getElementById('TXNAMT').value= result.TXNAMT ; 
                    document.getElementById('REFERENCEID').value= result.REFERENCEID ; 
                    document.getElementById('PARTICULARS').value= result.PARTICULARS ; 
    

                        return form.valid();
                            }
                    });

                
            }
           
            //     var $input = $('<input type="submit" style="margin-left:10px;background-color:#f89406" name="addCourse" value="Add Course" />');
            //     $input.appendTo($('ul[aria-label=Pagination]'));
            //     $('a[href$="next"]').text('Proceed To Payment');
            //   }
            //   else {
            //      $('ul[aria-label=Pagination] input[name="addCourse"]').remove();
            //   }
            return form.valid();
        },
       
        onFinished: function (event, currentIndex)
        {
            window.open("https://www.ican.org.np/new/student/profile","_self");

        },
        // onInit : function (event, currentIndex) {
        //     event.append('demo');
        // }
    });

    function deleteSelected (selected)
    {
        alert(selected);
        const index = selectedCourses.indexOf(selected);
            if (index > -1) {
                selectedCourses.splice(index, 1);
            }

            for(var i = 0; i < selectedCourses.length; i++) {
                $("#table1").append("<tr><td>"+(i+1)+"</td><td>"+selectedCourses[i].session_name+
                "</td><td>"+selectedCourses[i].name+"</td><td>"+selectedCourses[i].subject_name+
                "</td><td>"+selectedCourses[i].cost_per_sub+"</td><td>"+selectedCourses[i].start_dt+"</td><td><a  onclick='deleteSelected("+selectedCourses[i]+")'></a></td></tr>");
             
              }
    
    }

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        email: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: ""
    });

    $('#gender').parent().append('<ul class="list-item" id="newgender" name="gender"></ul>');
    $('#gender option').each(function(){
        $('#newgender').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#gender').remove();
    $('#newgender').attr('id', 'gender');
    $('#gender li').first().addClass('init');
    $("#gender").on("click", ".init", function() {
        $(this).closest("#gender").children('li:not(.init)').toggle();
    });
    
    var allOptions = $("#gender").children('li:not(.init)');
    $("#gender").on("click", "li:not(.init)", function() {
        allOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#gender").children('.init').html($(this).html());
        allOptions.toggle();
    });

    $('#country').parent().append('<ul class="list-item" id="newcountry" name="country"></ul>');
    $('#country option').each(function(){
        $('#newcountry').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#country').remove();
    $('#newcountry').attr('id', 'country');
    $('#country li').first().addClass('init');
    $("#country").on("click", ".init", function() {
        $(this).closest("#country").children('li:not(.init)').toggle();
    });
    
    var CountryOptions = $("#country").children('li:not(.init)');
    $("#country").on("click", "li:not(.init)", function() {
        CountryOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#country").children('.init').html($(this).html());
        CountryOptions.toggle();
    });

    $('#payment_type').parent().append('<ul  class="list-item" id="newpayment_type" name="payment_type"></ul>');
    $('#payment_type option').each(function(){
        $('#newpayment_type').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#payment_type').remove();
    $('#newpayment_type').attr('id', 'payment_type');
    $('#payment_type li').first().addClass('init');
    $("#payment_type").on("click", ".init", function() {
        $(this).closest("#payment_type").children('li:not(.init)').toggle();
    });
    
    var PaymentsOptions = $("#payment_type").children('li:not(.init)');
    $("#payment_type").on("click", "li:not(.init)", function() {
        PaymentsOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#payment_type").children('.init').html($(this).html());
        PaymentsOptions.toggle();
    });

        
})(jQuery);