<?php 
include('header.php');
?>
<?php include('container.php');?>
<div class="container">	
	<h2>Amazon S3 File Upload using JavaScript</h2>	
	<br>		
        <div id="progress" style="display: none">uploading</div>
	<form id="uploadForm" method='post' enctype="multipart/form-data">
		<h3>Upload File</h3><br/>
		<span id="showMessage" style="display:none;color:red;">File uploaded to Amazon server.</span>	
		<input type='file' name="upFile" id="upFile" required="" /> 
		<br>
		<input type='submit' value='Upload'/>	
	</form>	
</div>
<?php include('footer.php');?>