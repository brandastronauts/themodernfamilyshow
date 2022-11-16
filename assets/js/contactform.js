console.log(1);
    $("#contact_form3, #contact_form1").submit(function(e) {

console.log(2);
        e.preventDefault(); // avoid to execute the actual submit of the form.
        console.log(3);
        var form = $(this);
        var actionUrl = "mailerContact.php";

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
              alert(data); // show response from the php script.
            }
        });

			
			
        console.log(actionUrl);
        
    //         $.ajax({
    //             type:"POST",
    //             data:formdata,
    //             url:"mailerContact.php",
    //             success:function(result){
    //                 //disablePopup();
    //                 console.log(result);
    //                 if(result==1)
    //                 {
				// 		alert("Your Details are submitted successfully!!!");
				// 		location.reload();
    //                 } else {
				// 		alert("Something went wrong!!!");
				// 	}
    //             }
    //         });
    });
    