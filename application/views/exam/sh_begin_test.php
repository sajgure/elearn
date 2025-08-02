<?php $passage_data = $this->session->userdata('passage_data');
if(isset($passage_data) && !empty($passage_data))
{	
	redirect('main_result');
}  ?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Elearn | Instruction</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="<?php echo base_url(); ?>assets/exam/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/exam/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/exam/css/font-awesome.css" rel="stylesheet">
  
<link href="<?php echo base_url(); ?>assets/exam/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/exam/css/pages/signin.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/exam/img/favicon.PNG">
<style type="text/css">
	td,p,th{
		color: #020201;
	}
	li{
		padding: 4px;
	}
</style>
</head>
<body style="background: url('<?php echo base_url(); ?>assets/exam/img/back.jpg') no-repeat fixed center center / cover ;">
<div class="navbar navbar-fixed-top"> </div> <!-- /navbar -->
<div class="account-container" style=" background:#EAE2DF; width: 80%; margin-top: 12px; margin-bottom: 0;">
	<div class="navbar navbar-fixed-top">
		<center><p style="font-size: 18px; border-bottom: thin solid #000; color: #000049;"><b>सूचना</b></p></center>
	</div> 
	<div class="content clearfix"  style="margin-bottom: -15px;">
		<form action="redirect_section" id="check_user" method="post">
		    <div class="portlet" >
			    <div class="portlet-body">
			    	<p style="margin-top: -18px; font-size:13px; text-align: justify;">
			    	<span style="color:red;">
			    	<ol style="font-size: 15px;">	
			    		<li style="color: red;">या परीक्षेत मराठी व हिंदी माध्यमांसाठी दीर्घोत्तरी प्रश्न व उताऱ्याकरिता मंगल (Mangal) Font by default देण्यात येणार आहे. अन्य कोणताही Font वापरता येणार नाही, याची उमेदवाराने नोंद घ्यावी.</li>
			    		<li>प्रश्नामध्ये ज्या Cell मध्ये स्टेटमेंट सुरु केले आहे Answer sheet मधील त्याच Cell मध्ये स्टेटमेंट टाईप करावे. उदा. B3.</li>
						<li>पत्र, स्टेटमेंट मध्ये केलेले selection डीलीट झाल्यास विद्यार्थ्याला ते पुन्हा टाईप करावे लागू नये म्हणून कॉम्पुटरमध्ये उपलब्ध असलेली UNDO बटणची सुविधा Quick Access Toolbar मध्ये उपलब्ध करून दिली आहे.</li>
						<li>स्पीड Passage मध्ये विद्यार्थ्याने चुका दुरुस्त करू नयेत. स्पीड Passage मध्ये जर विद्यार्थाने Bakspace/Delete कीज वापरून चुका दुरुस्त केल्या तर प्रत्येक Bakspace/Delete की साठी चूक मोजली जाऊन प्रत्येक चुकीसाठी अर्धा गुण कमी करण्यात येईल.</li>
						<li>गती उतारा (Speed Passage) सुरु होण्यापूर्वी १५ सेकंदाचा countdown टायमर स्क्रीनवर दिसेल. या १५ सेकंदाच्या कालावधीत गती उतारा टाईप करता येणार नाही. १५ सेकंद पूर्ण झाल्यावर Speed Passage चा ७ मिनिटांचा टायमर सुरु होईल. या ७ मिनिटामध्ये विद्यार्थ्याने आपला स्पीड Passage पूर्ण करावयाचा आहे.</li>
						<li>जानेवारी २०१८ मध्ये होणाऱ्या परीक्षेत जास्तीचा एक स्पेस आणि / किंवा जास्तीचा एक Enter मान्य राहील. त्यापेक्षा जास्तीचे स्पेसेस किंवा जास्तीचे Enter असल्यास ते चुकांमध्ये मोजले जातील व त्याबाबत गुण कमी करण्यात येतील. </li>
						<li>परीक्षा चालू असताना विद्यार्थ्याने अन्यत्र कुठेही click करू नये.</li>
						<li>परीक्षेच्या दरम्यान टायपिंगच्या keys सोडून दुसऱ्या कोणत्याही keys चा वापर करू नये. दुसऱ्या keys म्हणजे Ctrl + Alt + Del, Alt + Tab, Windows, Function Keys(F1,F2,F3,F4,F5,F6,F7,F8,F9,F10,F11,F12), Refresh Button तसेच Windows Key कोणत्याही Combination मध्ये करू नये.</li>
						<li>ISM Software चालू केल्यानंतर त्याचा Floating Keyboard चालू असेल तर तो बंद करावा.</li>
						<li>Answer Side चे Zoom जेवढे आहे ते तसेच ठेवावे. त्यामध्ये बदल केल्यास Cursor मधेच दिसणे बंद होऊ शकतो.</li>
						<li>Letter आणि Speed Section मध्ये Rular चा जास्त वापर करू नये.</li>
						<li>Statement Section मध्ये Question Side ला Cell Drag करू नये.</li>
						<li>मराठी व हिंदी परीक्षा चालू असतांना ISM चा Scroll Lock/ Num Lock हे Email चा section चालू असतांना (ON) करावे.</li>
						<li>Objective विभागात दिलेल्या 4 पर्यायांपैकी एक पर्याय निवडा.</li>
						<li>परीक्षार्थीने मोबाईल फोन, कॅल्क्युलेटर, पेजर इ. कोणत्याही प्रकारचे इलेक्ट्रोनिक्स साहित्य किंवा इतर कोणत्याही प्रकारचे आक्षेपार्ह कागदपत्र स्वतःजवळ ठेऊ नये. परीक्षाकाळात असे साहित्य जवळ बाळगल्याचे आढळून आल्यास तसेच गैरप्रकार आढळून आल्यास तसेच गैरप्रकार केल्याचे निदर्शनास आल्यास त्या परीक्षार्थी विरुद्ध (Msceia) अंतर्गत कारवाई करण्यात येईल.</li>
					</ol>
					<span>
						<div class="row">
							<div class="span10">
								<p style="float: right; color: #000;"><b>If you are ready for the test, press 'Start Exam' button to start online test.</b></p>
							</div>
							<center><button class="btn btn-success" type="submit">Start Exam</button></center>
						</div>
					</span>			
				</div>
			</div>
		</form>
	</div> <!-- /content -->
</div> <!-- /account-container -->
<script src="<?php echo base_url(); ?>assets/exam/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/exam/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/disable_all.js"></script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
</body>
</html>