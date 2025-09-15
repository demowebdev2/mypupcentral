<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>


<style>
    .success-message {
  text-align: center;
  max-width: 500px;
  /* position: absolute; */
  top: 50%;
  left: 50%;
  max-height: 400px;
  /* transform: translate(-50%, -50%); */
}

.success-message__icon {
  max-width: 150px;
}

.success-message__title {
  color: #3DC480;
  transform: translateY(25px);
  opacity: 0;
  transition: all 200ms ease;
  margin: 30px 10px;
    font-weight: bold;
}
.active .success-message__title {
  transform: translateY(0);
  opacity: 1;
}

.success-message__content {
  color: #B8BABB;
  transform: translateY(25px);
  opacity: 0;
  transition: all 200ms ease;
  transition-delay: 50ms;
}
.active .success-message__content {
  transform: translateY(0);
  opacity: 1;
}

.icon-checkmark circle {
  fill: #3DC480;
  transform-origin: 50% 50%;
  transform: scale(0);
  transition: transform 200ms cubic-bezier(0.22, 0.96, 0.38, 0.98);
}
.icon-checkmark path {
  transition: stroke-dashoffset 350ms ease;
  transition-delay: 100ms;
}
.active .icon-checkmark circle {
  transform: scale(1);
}
</style>

<div class="main-container">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 col-md-8 col-sm-10 col-12 login-box mt-5">


<div class="success-message">
<svg style="max-height: 150px;"  viewBox="0 0 87 87" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<g id="Group-2" transform="translate(2.000000, 2.000000)">
						<circle id="Oval-2" stroke="rgba(252, 191, 191, .5)" stroke-width="4" cx="41.5" cy="41.5" r="41.5"></circle>
						<circle  class="ui-error-circle" stroke="#F74444" stroke-width="4" cx="41.5" cy="41.5" r="41.5"></circle>
							<path class="ui-error-line1" d="M22.244224,22 L60.4279902,60.1837662" id="Line" stroke="#F74444" stroke-width="3" stroke-linecap="square"></path>
							<path class="ui-error-line2" d="M60.755776,21 L23.244224,59.8443492" id="Line" stroke="#F74444" stroke-width="3" stroke-linecap="square"></path>
					</g>
			</g>
	</svg>
    <h1 class="success-message__title text-danger">Payment Failed</h1>
    <div class="success-message__content">
        <p></p>

      <h4><b>Something Went Wrong! Try Again</b></h4>
    </div>
</div>


            </div>
           
        </div>
    </div>
</div>
<br><br><br>


<script>
    function PathLoader(el) {
	this.el = el;
    this.strokeLength = el.getTotalLength();
	
    // set dash offset to 0
    this.el.style.strokeDasharray =
    this.el.style.strokeDashoffset = this.strokeLength;
}

PathLoader.prototype._draw = function (val) {
    this.el.style.strokeDashoffset = this.strokeLength * (1 - val);
}

PathLoader.prototype.setProgress = function (val, cb) {
	this._draw(val);
    if(cb && typeof cb === 'function') cb();
}

PathLoader.prototype.setProgressFn = function (fn) {
	if(typeof fn === 'function') fn(this);
}

var body = document.body,
    svg = document.querySelector('svg path');

if(svg !== null) {
    svg = new PathLoader(svg);
    
    setTimeout(function () {
        document.body.classList.add('active');
        svg.setProgress(1);
    }, 200);
}

// document.addEventListener('click', function () {
    
//     if(document.body.classList.contains('active')) {
//         document.body.classList.remove('active');
//         svg.setProgress(0);
//         return;
//     }
//     document.body.classList.add('active');
//     svg.setProgress(1);
// });
</script>