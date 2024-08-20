<?php include'connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>pdf</title>

    
    <meta name="viewport" content="width=device-width, initial-scale=0.5">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <style>
@import url('https://fonts.googleapis.com/css2?family=Acme&family=Courgette&family=Dancing+Script&family=Instrument+Serif:ital@1&family=Ysabeau&display=swap');
</style>
<style type="text/css">
  body {
    background: #e4e0db;
   
}
.container{
    display: flex;
    justify-content: center;
}
.next{
    height:925px;
        width: 595px;
         background: #fff;   
}
.next1{
    height:925px;
        width: 595px;
         background: #fff;   
}

.next2{
    height:930px;
        width: 595px;
         background: #fff;   
}
.next3{
    height:925px;
        width: 595px;
         background: #fff;   
}
.next4{
    height:925px;
        width: 595px;
         background: #fff;   
}
.next5{
    height:925px;
        width: 595px;
         background: #fff;   
}
.next6{
    height:925px;
        width: 595px;
         background: #fff;   
}
hr{
    border-top:1px solid black;
}
@media (max-width:720px){
.container{
width: 100%;

}
}
</style>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>
 <?php 
      $UserListtb = mysqli_query($conn,"SELECT * FROM payment WHERE status ='1'");
      while($usertb = mysqli_fetch_array($UserListtb))
      {
        $total_bill1 = $usertb['total_amount'];
      
      }
        
    ?>



   <div class="pd" style="display:flex;justify-content: center;">
        
         
      <button onclick="getPDF()" id="downloadbtn" style="display: inline-block;height: 50px;background: black;color: white;"><b>Download</b></button>
       
   </div>

 
           <div class="container" >
             <div class="canvas_div_pdf" >
                <div class="next"  style="border:10px solid orangered;">
                <div class="row">
                <div class="col-md-6 col-xs-6">
                    <img src="images/chill.jpeg" style="margin:10px;height: 50px;width: 180px;">
                    <p style="margin-left: 15px;font-family: math;">No.122/9 ,salem attur main road, Ayodhiyapatinam, Tamil Nadu, India, Salem, Tamil Nadu 636103</p>
                </div>
                <div class="col-md-6 col-xs-6">
                    <p style="float:right;padding: 20px;font-family:math;"><b>Tour Co-Ordinator</b><br><br><b>Consultant</b> : Mrs.Sarah<br><b>Number</b> : 7373 0303 77</p>
                </div>
            </div>

                 

                <div class="head">
                    <h3 class="text-center" style="font-family:math;"><b>Booking Confirmation</b></h3>
                     
                </div><br>

                <div class="container-fluid">
                    <h3 class="" style="font-family:math;text-align: left;">Dear<b>MR. Nagarajan</b></h3>
                    <h4 class="" style="font-family:math;text-align: left;">Dear<b>Greetings from Chill Memories!!!</b></h4><br>
                    <h4 class="" style="font-family:math;text-align: left;">Your booking is confirmed in the name of Mr.Nagarajan(2 Adults) 1 rooms for 5 nights from 25th Aug - 30th Aug.</h4>
                     
                </div><br>

                <div class="row" style="margin-top:7px;padding: 10px;">
                <div class="col-md-12 col-xs-12" >
                    <img src="images/my.jpg" style="height: 250px;width: 100%;display:flex;justify-content: center;border: 3px solid black;box-shadow:3px 4px 5px black;">
                </div>
            </div>
                <table >
                    
                    <tbody >
                        <tr >
                            <td ><img src="images/d.png" style="height: 30px;width: 30px;margin-left:50px;"> - Pickup</td>
                            <td ><b style="font-family:math;color: orangered;">[Bangalore Mysore]</b></td>
                        </tr>
                        <tr>
                            <td ><img src="images/n.png" style="height: 30px;width: 30px;margin-left: 50px;"> - Day & Night</td>
                            <td  ><b style="font-family:math;color: orangered;">[4 Days & 3 Nights]</b></td>
                        </tr>
                        <tr>
                            <td ><img src="images/t.png" style="height: 30px;width: 30px;margin-left: 50px;"> - Tour Type</td>
                            <td ><b style="font-family:math;color: orangered;">[Honeymoon]</b></td>
                        </tr>
                        <tr>
                            <td ><img src="images/d1.png" style="height: 30px;width: 30px;margin-left: 50px;"> - Desitination</td>
                            <td ><b style="font-family:math;color: orangered;">[Bangalore - Chikkilihole Dam - Mysore]</b></td>
                        </tr>
                        <tr>
                            <td ><img src="images/c.png" style="height: 30px;width: 30px;margin-left: 50px;"> - Car</td>
                            <td ><b style="font-family:math;color: orangered;">[Sedan Car]</b></td>
                        </tr>
                        <tr >
                            <td ><img src="images/m.png" style="height: 30px;width: 30px;margin-left: 50px;"> - Meals</td>
                            <td ><b style="font-family:math;color: orangered;">[Breakfast only]</b></td>
                        </tr>
                    </tbody>
                </table>

                <p style="text-align:center;font-family:none;margin-top: 7px;color: orangered;">Email: mail@chillmemories.com | PH.+91 7373 0303 77 | https://chillmemories.com</p>
        </div><br>
               

                
           
<!-------------------------next1------------------------------------->



             <div class="next1" style="border:10px solid orangered ;" >
                
                <div class="row" style="padding-top:20px">
                <div class="col-md-4 col-xs-4">
                    <hr>
                </div>
                <div class="col-md-4 col-xs-4">
                   <h4 class="text-center" style="color:orangered;font-family: math;"><b>DAY WISE PLAN</b></h4> 
               </div>
               <div class="col-md-4 col-xs-4">
                <hr>
               </div>
                </div>




                <table >
                    
                    <tbody >
                        <tr >
                            <td ><img src="images/d.png" style="height: 100px;width: 100px;margin-left: 10px;"><p ><b style="font-family: math;margin-left: 10px;color: orangered;">Day 1 - Mysore</b></p></td>
                            <td ><p style="text-align:justify;padding: 10px;font-family:math;"> We pick you from Mysore/ Bangalore railway station or airport and proceed to sightseeing.<br>
  At first, we cover Chamundi hills. On the top of hill, we get to see Sri Chamundeshwari Temple dedicated for
Lord Shiva. Then we visit St.Philomenas church which is one of the largest cathedrals in India built in Gothic
architecture. <br>
   After this, we head to the famous Mysore zoo which is 2 Km. It has the best wildlife spotting place. Then we
head to popular Mysore palace. It was the home for kings. This place has great architecture. <br>
   By evening we visit Brindavan garden which is famous for musical color fountain. Overnight stay at Mysore
hotel.</p></td>
                        </tr>

                        <tr>
                            <td ><img src="images/d.png" style="height: 100px;width: 100px;margin-left: 10px;"><p ><b style="font-family: math;margin-left: 10px;color: orangered;">Day 2 -  Coorg sightseeing</b></p></td>
                            <td ><p style="text-align:justify;padding: 10px;font-family:math;"> After breakfast, we check out from Mysore hotel and drive towards Coorg which is 112 km away.<br>
  At first, we check out BylukuppeTibettian settlement. Here is where you can find a lot of Tibetian culture and
lifestyle. <br>
  Then, we go to Cauvery Nisargadhama. It is a forest on an island with lush green trees and wildlife. <br>
  Finally, we head to Dubare elephant camp. This is a river camp which has trained Elephants and their mahout
who bathe them and feed them. It is managed by the forest department and Jungle Lodges and Resorts Ltd. <br>
  By evening, we check in at Coorg hotel. Overnight stay at Coorg.</p></td>
                        </tr>

                        <tr>
                            <td ><img src="images/d.png" style="height: 100px;width: 100px;margin-left: 10px;"><p ><b style="font-family: math;margin-left: 10px;color: orangered;">Day 3 -  Coorg sightseeing </b></p></td>
                            <td ><p style="text-align:justify;padding: 10px;font-family:math;"> After breakfast, we depart Chiklihole dam which is a reservoir located near the town of Nanjarayapattana.
Then, we can visit Mandalpatti peak. It is a great view point for nature lovers.<br> 
  Then, we head to majestic Raja seat and Rajas tomb. The place Raja seat has a history of having the king of
Coorg to spend his time witnessing the scenic of the place. Rajas tomb was built in Indo-saracenic style and dates
back to 1820. Overnight stay at Coorg. <br>
  Get indulged in the fresh waters of Abby falls which is 18 km away and witness the beauty of landscape.<br>
  </p></td>
                        </tr>
                        
                        
                    </tbody>
                </table>
                
<p style="text-align:center;font-family:none;margin-top: 20px;color: orangered;">Email: mail@chillmemories.com | PH.+91 7373 0303 77 | https://chillmemories.com</p>
        </div><br>

<!-------------------------next2------------------------------------->

        <div class="next2" style="border:10px solid orangered;" >

           <table >
                    
                    <tbody >
                        <tr style="background-color: #f2f2f2;">
                            <td ><img src="images/d.png" style="height: 100px;width: 100px;margin-left: 10px;"><p ><b style="font-family: math;margin-left: 10px;color: orangered;">Day 4 -  Coorg to Mysore</b></p></td>
                            <td ><p style="text-align:justify;padding: 10px;font-family:math;"> After breakfast, we check out from the hotel and drive to Mysore which is 117 km. <br>
  We take you for local shopping at Mysore then we drop you at Mysore or Bangalore railway station or airport
based on your convenience.</p></td>
                        </tr>
                    </tbody>
                </table><br>

            


                <div class="row" style="margin-top:10px;">
                <div class="col-md-4 col-xs-4">
                    <hr>
                </div>
                <div class="col-md-4 col-xs-4">
                   <h4 class="text-center" style="color:orangered;font-family: math;"><b>INCLUSIONS</b></h4> 
               </div>
               <div class="col-md-4 col-xs-4">
                <hr>
               </div>
                </div>

 <table >
                    
                    <tbody >
                        <tr >
                            <td ><img src="images/d.png" style="height: 50px;width: 50px;margin-left:50px;"></td>
                            <td><b style="font-family:math;color: orangered;">Bangalore & Mysore</b></td>
                        </tr>

                        <tr>
                            <td ><img src="images/c.png" style="height: 50px;width: 50px;margin-left: 50px;"></td>
                            <td ><b style="font-family:math;color: orangered;">Individual Sedan Ac car for the entire trip with experienced driver cum guide</b></td>
                        </tr>

                        <tr>
                            <td ><img src="images/h.png" style="height: 50px;width: 50px;margin-left: 50px;"></td>
                            <td  ><b style="font-family:math;color: orangered;"> 1 Night Mysore stay with breakfast</b></td>
                        </tr>
                        <tr>
                            <td ><img src="images/h.png" style="height: 50px;width: 50px;margin-left: 50px;"></td>
                            <td ><b style="font-family:math;color: orangered;"> 2 Nights Coorg stay with breakfast</b></td>
                        </tr>
                        <tr>
                            <td ><img src="images/s.png" style="height: 50px;width: 50px;margin-left: 50px;"></td>
                            <td ><b style="font-family:math;color: orangered;"> 4 days sightseeing as per the itinerary</b></td>
                        </tr>
                        
                       
                    </tbody>
                </table><br>


                <div class="head">
                    <h3 class="text-center" style="font-family:math;color: black;"><b> Spl Honeymoon Inclusion</b></h3>
                    
                </div><br>

                <div class="head2">
                   <p style="display: flex;justify-content: center;font-family: math;color: orangered;"><b>---> One candle light dinner <br>
 ---> Flower bed decoration <br>
 ---> Honeymoon cake</b></p>
                </div>



                <div class="row" style="margin-top:20px;">
                <div class="col-md-4 col-xs-4">
                    <hr>
                </div>
                <div class="col-md-4 col-xs-4">
                   <h4 class="text-center" style="color:orangered;font-family: math;"><b>EXCLUSIONS</b></h4> 
               </div>
               <div class="col-md-4 col-xs-4">
                <hr>
               </div>
                </div><br><br>


                <div class="head2">
                   <p style="display: flex;justify-content: center;font-family: math;color: black;"><b>---> No Exclusions for this package</b></p>
                </div>
<p style="text-align:center;font-family:none;margin-top: 40px;color: orangered;">Email: mail@chillmemories.com | PH.+91 7373 0303 77 | https://chillmemories.com</p>

        </div><br><br>
               


<!-------------------------next3------------------------------------->



<div class="next3" style="border:10px solid orangered;" >
               <div class="row" style="margin-top:20px;">
                <div class="col-md-4 col-xs-4">
                    <hr>
                </div>
                <div class="col-md-4 col-xs-4">
                   <h4 class="text-center" style="color:orangered;font-family: math;"><b> PACKAGE CATEGORY & PRICE</b></h4> 
               </div>
               <div class="col-md-4 col-xs-4">
                <hr>
               </div>
                </div><br>


                <div class="head2">
                   <p style="text-align: justify;font-family: math;color: black;padding: 10px;"><b>( During Festival dates & Long Weekends , Season time -Package price may slightly increase based on
the hotels availability & demand . check availability with our team once - for better deal ) </b></p>
                </div>



                 <table >
                    
                    <tbody >
                        <tr >
                            <td ><img src="images/pa.png" style="height: 50px;width: 50px;margin-left:50px;"></td>
                            <td> - Premium package </td>
                            <td><b style="font-family:math;color: orangered;"> Rs.32,000/- per couple </b></td>
                        </tr>

                        <tr>
                            <td ><img src="images/h.png" style="height: 50px;width: 50px;margin-left: 50px;"></td>
                            <td> - Hotels</td>
                            <td ><b style="font-family:math;color: orangered;"> 4 star , 5 star hotels at Mysore , Premium Coffee resorts at Coorg.</b></td>
                        </tr>

                        
                       
                    </tbody>
                </table><br>


                <div class="row" >
                <div class="col-md-4 col-xs-4">
                    <hr>
                </div>
                <div class="col-md-4 col-xs-4">
                   <h5 class="text-center" style="color:orangered;font-family: math;"><b> PAYMENT TERMS, CANCELLATION & OTHER POLICIES -</b></h5> 
               </div>
               <div class="col-md-4 col-xs-4">
                <hr>
               </div>
                </div><br>

             

            
                <div class="head2">
                   <p style="font-family: math;color: black;padding: 10px;text-align: justify;"><b>Booking Confirmation : Booking will be confirmed with 50 percent of the package amount. Remaining will be collected 2 days before
 the trip starts . </b><br><br>
1. Booking will be confirmed 50 percent of the total package cost , Remaining Payments should be cleared 2 days before the trip starts.
 if any payment pending during tour , it may affect the services committed .<br>
2. Some Hotels Resorts ( Premium Luxury hotels ) will ask 100 percent payments to confirm the booking . That case we also will ask
 100 percent payment to confirm the booking .<br>
3. Cancellation Policy: In the event of cancellation of tour travel services due to any avoidableunavoidable reasons we must be 
 notified of the same in writing. ( Rs.1000 per person will be charged compulsory if any cancelation or any modification in the plan ) . <br><br>
<b>Cancellation charges will be effective from the date we receive advice in writing, and cancellation charges would be as follows:</b><br><br>
i. High Season Festival time Long weekends Christmas - new year season - Cancellation is based
on respective hotels terms.<br>
ii. No charge if cancelled within 30 days of tour start.<br>
iii. 50% of tour cost charge if cancelled within 15 days.<br>
iv. 100% charge if cancelled within 7 days prior to tour.
</p>
                </div>
          



<p style="text-align:center;font-family:none;margin-top: 10px;color: orangered;">Email: mail@chillmemories.com | PH.+91 7373 0303 77 | https://chillmemories.com</p>
                 

        </div><br><br>



<!-------------------------next4------------------------------------->



<div class="next4" style="border:10px solid orangered;" >
               
                <div class="head2" style="margin-top:20px">
                   <p style="font-family: math;color: black;padding: 10px;text-align: justify;">
v. Last minute ( less then 3 days) cancellation , modification , hotel changes will not entertain at any reason .
vi. Refund will take 7-15 business days.<br><br>
<b>( Above Cancellation may slightly adjustable on pandemic time or Extreme Nature problems )</b></p>
                </div>

            <div class="head2" style="margin-top:20px">
                   <p style="font-family: math;color: black;padding: 10px;text-align: justify;">
<b>HOTEL POLICY</b><br>
 1. Early checkin and late checkout subject to Hotels availability. ( Normally Hotel Check in
at 12 Noon , Check out at 11 AM )<br>
2. Arrival day breakfast will not be complimentary.<br>
3. All the hotels will ask valid ID proofs while check in<br>
4. Above 11 yrs old child considered as Adult - chargeable basis only .<br>
5. Lower then 2 star hotels we wont handle . (A Guests Safety , Good hospitality hotels are our priority we wont compromise on it)<br>
6. We shall proceed with the booking only after we receive confirmation as Advance from your
side .<br>
7. During Holiday season, all hotels get sold out around two months ahead, so the sooner you
book the better your prospects of getting a good room, at a good hotel, at a good price.
Hotel rooms can be confirmed only through pre-payment as advance only .<br>
8. If rooms are not available at the hotels specified, then rooms will be booked at alternate
similar category hotels.<br>
9. Extra beds are not full fledged cots with mattresses but rollaways placed on the floor.
Room Heaters, Meals and Wildlife activities are never a part of the package come at
extra costs, unless explicitly mentioned, otherwise.<br>
10. Christmas NewYear Eve Gala Dinner Compulsory supplements, if any, are payable
directly.(Directly to the Hotel if they Ask)</p>
                </div>



                <div class="head2" style="margin-top:10px">
                   <p style="font-family: math;color: black;padding: 10px;text-align: justify;">
<b>CAR SIGHT SEEING</b><br>
1. During Holiday seasons, all transporters get fully sold out around one month ahead, so the
sooner you book, the better your prospects of getting a good car, with a good driver at a
good price. If the particular vehicle type is unavailable, then a suitable alternate similar
category vehicle will be provided.<br>
2. Allocated driver will act as a guide also , Every day evening pls have a discussion with our
driver for next days plan and timings , Kindly maintain good commutation with drivers.<br>
3. All Major sightseeing places will open at 10 am and close at 5 pm .<br>
4. Normal Sightseeing by cab timings are 9.00 am to 7 pm , after 8 pm chargeable by Km Basis.<br>
5. Sightseeing attractions will be coverd as per the committed plan only . OnSpot planning
new things will not entertain , extra sightseeing on extra cost basis if it can be covered .<br>
</p>
                </div>

              <p style="text-align:center;font-family:none;margin-top: 10px;color: orangered;">Email: mail@chillmemories.com | PH.+91 7373 0303 77 | https://chillmemories.com</p>    

        </div><br><br>


<!-------------------------next5------------------------------------->



<div class="next5" style="border:10px solid orangered;" >

                <div class="head2" style="margin-top:20px">
                   <p style="font-family: math;color: black;padding: 10px;text-align: justify;">

6. Boat riding , Jeep safari ,Toy train , river rafting. Entry fees of Sightseeing all - Not
included any of our packages<br>
7. Kindly follow the local Govt Rules and regulations strictly, if any penalty charges
charged by govt or police we are not responsible<br>
8. Drivers Food Accommodation already include in the package.<br>
9. If any sightseeing places are closed , due to covid , sudden lockdown , political issues, Heavy rain , road blocks , renovation like -<br>
we ( Company ) are not responsible for that. 
10. If any place - Negative RT - PCR Certificate is Compulsory its charges traveler should
manage<br>
11. Wearing mask in public places , using hand wash - advisable at all the places .<br>
12. Vehicle Air conditioning is generally switched off during Uphill steep climbs.<br>
13. Our driver will take care of all fuel, road user fees, parking fees, toll, RTO fees Interstate
taxes.(Driver will Manage all his own but just treat him your won driver he will serve
100 times more)<br>
14. Please see that your baggage is adequately locked. Vehicles remain unattended in parking
areas, so please do not leave valuables in the car at any time kindly carry your own
music on pen drive or memory card.</p>
                </div>


                <p style="text-align:center;font-family:none;float: bottom;color: orangered;">Email: mail@chillmemories.com | PH.+91 7373 0303 77 | https://chillmemories.com</p>

        </div>


<!-------------------------next6------------------------------------->




<?php 
 ?>

                </div>
           </div>




       

    



</body>

    <!--   Core JS Files   -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

   

 <script >function getPDF(){

        var HTML_Width = $(".canvas_div_pdf").width();
        var HTML_Height = $(".canvas_div_pdf").height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width+(top_left_margin*2);
        var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;
        
        var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
        

        html2canvas($(".canvas_div_pdf")[0],{allowTaint:true}).then(function(canvas) {
            canvas.getContext('2d');
            
            console.log(canvas.height+"  "+canvas.width);
            
            
            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
            
            
            for (var i = 1; i <= totalPDFPages; i++) { 
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
            }
            
            pdf.save("Chill_Memories.pdf");
        });
    };</script>
    
</html>
