@extends('layouts.master')
@section('content')
@section('title', ' Add Gallery')

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
            <div class="card-body"> 
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif 
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form  action="{{URL::to('admin/gallery/')}}" name="form1" id="form1" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                   
                    <div class="panel-body">
						
					<div class="row">
						<div class="col-12 col-md-3 col-lg-3">
							<div class="form-group">
								<label>Page Language:</label>
								<span class="star">*</span>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-6">
							<div class="input_class form-group">
								<input type="radio" name="language" autocomplete="off" id="txtlanguage" onclick="getPage(this.value);" value="1"  @if(old('language')==1) checked @endif class="@error('language') is-invalid @enderror" />English &nbsp;
								<input type="radio" name="language" autocomplete="off" id="txtlanguage" onclick="getPage(this.value);" value="2"  @if(old('language')==2) checked @endif class="@error('language') is-invalid @enderror"  />Hindi &nbsp;
							       @if($errors->has('language'))
                                    <p class="text-danger">{{ $errors->first('language') }}</p>
                                    @endif
							</div>
						</div>
					</div>
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Menu Title:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input name="menu_title"
                                    onkeypress="return onlyAlphabets(event,this);" autocomplete="off" type="text" 
                                    class="input_class form-control  @error('menu_title') is-invalid @enderror" id="txtename"   value="{{old('menu_title')}}"  />
                                    @error('menu_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                       
                       
                            
                        <div class="row" id="txtPDF" >
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label>Image Upload:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">

                                    <input type="file" name="imguplode[]" class="input_class  @error('imguplode') is-invalid @enderror  inline-block" id="imguplode" />
                                    @if($errors->has('imguplode'))
                                    <p class="text-danger">{{ $errors->first('imguplode') }}</p>
                                    @endif

								</div>
                            </div>
                            <div class="form-group">
                                <span class="btn btn-success" value="Add More" onclick="add_file();">Add More</span>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                            <div class="form-group">
                            <p id="file_div"></p>
                            </div>
                            </div>
                            </div>

                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label> Category:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <select name="category" class="input_class form-control" id="category" autocomplete="off">
                                        <option value=""> Select </option>
                                        <option value="1" {{ old('category') == 1 ? 'selected' : '' }}> Gallery </option>
                                        <option value="2" {{ old('category') == 2 ? 'selected' : '' }}> Progress Photographs </option>
                                        <option value="3" {{ old('category') == 3 ? 'selected' : '' }}> Vigilance Awareness </option>
                                    </select>
                                    @if($errors->has('category'))
                                    <p class="text-danger">{{ $errors->first('category') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
						<div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label> Status:</label>
                                    <span class="star">*</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                <select name="txtstatus" class="input_class form-control" id="txtstatus" autocomplete="off">
                                    <option value=""> Select </option>
                                        <?php
                                        $statusArray = get_status();
                                        foreach($statusArray as $key=>$value) {
                                            ?>
                                            <option value="<?php echo $key; ?>" <?php if(old('txtstatus')==$key) echo "selected"; ?>><?php echo $value; ?></option>
                                        <?php  }?>
                                </select>
                                  @if($errors->has('txtstatus'))
                                    <p class="text-danger">{{ $errors->first('txtstatus') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-xm-12">
                                <div class="pull-right">
                               
                                    <input name="cmdsubmit" type="submit" class="btn btn-success" id="cmdsubmit" value="Submit" />&nbsp;
                                    <a href="{{URL::to('admin/gallery/')}}" class="btn btn-primary" >back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </form>
               

            </div>
        </div>
    </div>
</div>
@endsection
 <!-- Name: Kesh Kumar
      Date: 31-10-23
      Reason: This Javascript used for the dynamically add input.
      -->
<script>
function add_file()
{
	$("#file_div").append("<div><input type='file' name='imguplode[]'><input type='button' class='btn btn-danger' value='REMOVE' onclick=remove_file(this);><div>&nbsp;");
}
function remove_file(ele)
{
	$(ele).parent().remove();
}
</script>