
  <!-- Main Content -->
  @extends('front.layouts.master')
 @section('title','contact')
 @section('bg','data:image/jpeg;base64,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')
 @section('content')
 <div class="col-lg-8 col-md-10 mx-auto">
     <div class="alert alert-success">
         @if(session('success'))
         {{session('success')}}
     </div>
     @endif
     @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form method="post" action="{{route('contact.post')}}">
            @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Name</label>
              <input type="text" class="form-control" value="{{old("name")}}" placeholder="Name" name="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email Address</label>
              <input type="email" class="form-control" value="{{old("email")}}" placeholder="Email Address" name="email">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Matter</label>
              <select class="form-control" name="topic">
              <option @if(old('topic')=='Information') selected @endif>Information</option>
              <option @if(old('topic')=='Help') selected @endif>Help</option>
              <option @if(old('topic')=='General') selected @endif>General</option>
            </select>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" class="form-control" placeholder="Message" name="message" required data-validation-required-message="Please enter a message.">
               {{old('message')}}

              </textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
@endsection

