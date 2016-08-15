

<form class="form-horizontal" method="post"
 action="index.php?v=upload" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Upload file</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" 
  for="filename">File name</label>  
  <div class="col-md-5">
  <input id="filename" name="filename" 
  type="text" placeholder="file name" 
  class="form-control input-md"  required>
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="uploadfile">File </label>
  <div class="col-md-4">
    <input id="uploadfile" name="uploadfile" class="input-file" type="file"  required>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="upload"></label>
  <div class="col-md-4">
    <button type='submit' id="upload" name="upload" value='upload' class="btn btn-info">upload</button>
  </div>
</div>

</fieldset>
</form>
