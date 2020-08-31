<button id="top" class="btn-top">
    <img src="{{ asset('imgs/icon_arrow.svg') }}" alt="">
</button>

<div class="footer__wrapper">
    <div class="footer__contact">
        <ul class="contact__list">
            <li class="contact__item">
                <a href="" data-toggle="modal" data-target="#exampleModal">
                    <img src="{{ asset('imgs/skype.svg') }}" alt="Skype">
                </a>
            </li>
            <li class="contact__item">
                <a href="https://www.linkedin.com/in/nhi-le-97b492144/" target="_blank">
                    <img src="{{ asset('imgs/linkedin.svg') }}" alt="Linked In">
                </a>
            </li>
            <li class="contact__item">
                <a href="https://github.com/LouisaLe" target="_blank">
                    <img src="{{ asset('imgs/github.svg') }}" alt="Github">
                </a>
            </li>
            <li class="contact__item">
                <a href="https://codepen.io/nhile1001" target="_blank">
                    <img src="{{ asset('imgs/codepen.svg') }}" alt="Codepen">
                </a>
            </li>
        </ul>
    </div>
    <div class="footer__trademark">
        &copy; <span>2020</span> <a href="#">Rita Nhi Le.</a> All rights reserved.
    </div>
</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Skype Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Skype Name: live:nhiltb3994</p>
        <p>Email: nhiltb3994@gmail.com</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>