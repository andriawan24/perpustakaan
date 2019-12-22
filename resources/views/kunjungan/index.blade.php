@extends('layout_kunjungan.master')

@section('title', 'Kunjungan - Perpustakaan SMKN 2 Bandung')

@section('content')
    <!-- Paralax Background -->

<div class="parallax">
    <h1>SELAMAT DATANG</h1>
    <h2>Di Perpustakaan SMK Negeri 2 Kota Bandung</h2>
    <div>&nbsp;</div>
    <!-- Pop Up Login -->
    <!-- Button trigger modal -->
    <nav class="main-nav" style="margin-top: 120px">
      <ul class="d-flex justify-content-around">
        <a class="btn btn-primary signup py-3 px-4 ml-4" style="float:left; min-width: 200px;" href="#signup">Non-Anggota</a>
        <a class="btn btn-primary signin py-3 px-4 mr-5" href="#signin" style="float:right;min-width: 200px;">Anggota</a>
      </ul>
    </nav>
  
  <!-- Modal -->
  
  <div class="user-modal" style="padding-top:45px">
    <div class="user-modal-container">
        <ul class="switcher">
            <li><h3><b>D a t a&nbsp; P e n g u n j u n g</b></h3></li>
        </ul>

        <div id="login">
            <form class="form" method="post" action="{{ route("kunjungan.anggota") }}">
                @csrf
                <p class="fieldset">
                    <label class="image-replace email" for="signin-username">Email</label>
                    <input class="full-width has-padding has-border" id="signin-username" type="email" name="email" autocomplete="off" placeholder="Email" autofocus required>
                </p>

                <p class="fieldset">
                    <label class="image-replace password" for="signin-password">Password</label>
                    <input class="full-width has-padding has-border" name="password" id="signin-password" type="password" placeholder="Password" required>
                    <a href="#0" class="hide-password">Show</a>
                </p>
                <div>&nbsp;</div>
                <p class="fieldset">
                    <button type="submit" class="btn btn-primary" style="width: 100%;padding: 20px" name="submit">Submit</button>
                </p>
            </form>
            <p class="form-bottom-message"><a href="#0" style="font-size: 1rem">Forgot your password?</a></p>
            <!-- <a href="#0" class="close-form">Close</a> -->
        </div>

        <div id="signup">
            <form class="form" method="post" action="{{ route("kunjungan.murid")}}">
                @csrf
                <p class="fieldset">
                    <label class="image-replace username" for="signin-username">Nama</label>
                    <input class="full-width has-padding has-border" id="signin-username" type="text" name="name" autocomplete="off" placeholder="Nama" autofocus required>
                </p>

                <p class="fieldset">
                  <label class="image-replace username" for="signin-password">Kelas</label>
                  <select name="class" autocomplete="off" id="class" style="width: 100%" required>
                      <option value="0">Pilih Kelas :</option>
                  </select>
                </p>

                <p class="fieldset">
                    <label class="image-replace" for="signin-username">Alamat</label>
                    <select name="jk" autocomplete="off" style="width: 100%" required class="full-width has-padding has-border">
                      <option value="#">Jenis Kelamin : </option>
                      <option value="0">Perempuan</option>
                      <option value="1">Laki-laki</option>
                  </select>
                </p>

                <p class="fieldset">
                    <label class="image-replace" for="signin-username">Alamat</label>
                    <input class="full-width has-padding has-border" id="signin-username" type="text" name="address" autocomplete="off" placeholder="Alamat" autofocus required>
                </p>
                
                <p class="fieldset">
                    <label class="image-replace email" for="signin-username">Email</label>
                    <input class="full-width has-padding has-border" id="signin-username" type="email" name="email" autocomplete="off" placeholder="Email" autofocus required>
                </p>
                
                <p class="fieldset">
                    <label class="image-replace" for="signin-username">No Telepon</label>
                    <input class="full-width has-padding has-border" id="signin-username" type="text" name="phone_number" autocomplete="off" placeholder="No. Telepon" autofocus required>
                </p>

                <p class="fieldset">
                    <button type="submit" class="btn btn-primary" style="width: 100%;padding: 20px" name="submit">Submit</button>
                </p>
            </form>
        </div>

        <div id="reset-password">
            <p class="form-message">Lost your password? Please enter your email address.<br> You will receive a link to create a new password.</p>

            <form class="form">
                <p class="fieldset">
                    <label class="image-replace email" for="reset-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                </p>

                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" value="Reset password">
                </p>
            </form>

            <p class="form-bottom-message"><a href="#0" style="font-size: 1rem">Back to log-in</a></p>
        </div>
        <a href="#0" class="close-form">Close</a>
    </div>
  </div>
  <!-- End Modal -->
</div>
@endsection

@push('js')
<script>
    // $("#class").select2()
    var CSRF_TOKEN = $("meta[name='csrf-token']").attr('content');
    $("#class").select2({
      ajax: {
        url: "{{ route('kunjungan.getKelas') }}",
        type: "post",
        dataType: "json",
        delay: 250,
        data: function(params) {
          return {
            _token: CSRF_TOKEN,
            search: params.term
          };
        },
        processResults: function(response){
          return {
            results: response
          };
        },
        cache: true
      }
    });
    
    jQuery(document).ready(function($){
    var $form_modal = $('.user-modal'),
      $form_login = $form_modal.find('#login'),
      $form_signup = $form_modal.find('#signup'),
      $form_forgot_password = $form_modal.find('#reset-password'),
      $form_modal_tab = $('.switcher'),
      $tab_login = $form_modal_tab.children('li').eq(0).children('a'),
      $tab_signup = $form_modal_tab.children('li').eq(1).children('a'),
      $forgot_password_link = $form_login.find('.form-bottom-message a'),
      $back_to_login_link = $form_forgot_password.find('.form-bottom-message a'),
      $main_nav = $('.main-nav');
  
    //open modal
    $main_nav.on('click', function(event){
      
      if( $(event.target).is($main_nav) ) {
        // on mobile open the submenu
        $(this).children('ul').toggleClass('is-visible');
      } else {
        // on mobile close submenu
        $main_nav.children('ul').removeClass('is-visible');
        //show modal layer
        $form_modal.addClass('is-visible'); 
        //show the selected form
        ( $(event.target).is('.signup') ) ? signup_selected() : login_selected();
      }
  
    });
  
    //close modal
    $('.user-modal').on('click', function(event){
      if( $(event.target).is($form_modal) || $(event.target).is('.close-form') ) {
        $form_modal.removeClass('is-visible');
      } 
    });
    //close modal when clicking the esc keyboard button
    $(document).keyup(function(event){
        if(event.which=='27'){
          $form_modal.removeClass('is-visible');
        }
      });
  
    //switch from a tab to another
    $form_modal_tab.on('click', function(event) {
      event.preventDefault();
      ( $(event.target).is( $tab_login ) ) ? login_selected() : signup_selected();
    });
  
    //hide or show password
    $('.hide-password').on('click', function(){
      var $this= $(this),
        $password_field = $this.prev('input');
      
      ( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
      ( 'Show' == $this.text() ) ? $this.text('Hide') : $this.text('Show');
      //focus and move cursor to the end of input field
      $password_field.putCursorAtEnd();
    });
  
    //show forgot-password form 
    $forgot_password_link.on('click', function(event){
      event.preventDefault();
      forgot_password_selected();
    });
  
    //back to login from the forgot-password form
    $back_to_login_link.on('click', function(event){
      event.preventDefault();
      login_selected();
    });
  
    function login_selected(){
      $form_login.addClass('is-selected');
      $form_signup.removeClass('is-selected');
      $form_forgot_password.removeClass('is-selected');
      $tab_login.removeAttr('selected');
      $tab_signup.removeClass('selected');
    }
  
    function signup_selected(){
      $form_login.removeClass('is-selected');
      $form_signup.addClass('is-selected');
      $form_forgot_password.removeClass('is-selected');
      $tab_login.removeClass('selected');
      $tab_signup.addClass('selected');
    }
  
    function forgot_password_selected(){
      $form_login.removeClass('is-selected');
      $form_signup.removeClass('is-selected');
      $form_forgot_password.addClass('is-selected');
    }
  
  
    //IE9 placeholder fallback
    //credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
    if(!Modernizr.input.placeholder){
      $('[placeholder]').focus(function() {
        var input = $(this);
        if (input.val() == input.attr('placeholder')) {
          input.val('');
          }
      }).blur(function() {
        var input = $(this);
          if (input.val() == '' || input.val() == input.attr('placeholder')) {
          input.val(input.attr('placeholder'));
          }
      }).blur();
      $('[placeholder]').parents('form').submit(function() {
          $(this).find('[placeholder]').each(function() {
          var input = $(this);
          if (input.val() == input.attr('placeholder')) {
            input.val('');
          }
          })
      });
    }
  
  });
  
  
  //credits https://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
  jQuery.fn.putCursorAtEnd = function() {
    return this.each(function() {
        // If this function exists...
        if (this.setSelectionRange) {
            // ... then use it (Doesn't work in IE)
            // Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
            var len = $(this).val().length * 2;
            this.setSelectionRange(len, len);
        } else {
          // ... otherwise replace the contents with itself
          // (Doesn't work in Google Chrome)
            $(this).val($(this).val());
        }
    });
  };
  </script>
@endpush