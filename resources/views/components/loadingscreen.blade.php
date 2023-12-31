

<style>
    
    .blurred-background{
        position: fixed;
    left: 0;
    top: 0;
    background-color: rgb(0 0 0 / 70%);
    width: 100%;
    height: 100%;
    z-index: 10000;
    backdrop-filter: blur(3px);
    opacity: 1;
    }
/* 
    position: fixed;
    left: 0;
    top: 0;
    background-color: rgb(0 0 0 / 70%);
    width: 100%;
    height: 100%;
    z-index: 10000;
    backdrop-filter: blur(3px); */

    .lds-default {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-default div {
  position: absolute;
  width: 6px;
  height: 6px;
  background: #fff;
  border-radius: 50%;
  animation: lds-default 1.2s linear infinite;
}
.lds-default div:nth-child(1) {
  animation-delay: 0s;
  top: 37px;
  left: 66px;
}
.lds-default div:nth-child(2) {
  animation-delay: -0.1s;
  top: 22px;
  left: 62px;
}
.lds-default div:nth-child(3) {
  animation-delay: -0.2s;
  top: 11px;
  left: 52px;
}
.lds-default div:nth-child(4) {
  animation-delay: -0.3s;
  top: 7px;
  left: 37px;
}
.lds-default div:nth-child(5) {
  animation-delay: -0.4s;
  top: 11px;
  left: 22px;
}
.lds-default div:nth-child(6) {
  animation-delay: -0.5s;
  top: 22px;
  left: 11px;
}
.lds-default div:nth-child(7) {
  animation-delay: -0.6s;
  top: 37px;
  left: 7px;
}
.lds-default div:nth-child(8) {
  animation-delay: -0.7s;
  top: 52px;
  left: 11px;
}
.lds-default div:nth-child(9) {
  animation-delay: -0.8s;
  top: 62px;
  left: 22px;
}
.lds-default div:nth-child(10) {
  animation-delay: -0.9s;
  top: 66px;
  left: 37px;
}
.lds-default div:nth-child(11) {
  animation-delay: -1s;
  top: 62px;
  left: 52px;
}
.lds-default div:nth-child(12) {
  animation-delay: -1.1s;
  top: 52px;
  left: 62px;
}
@keyframes lds-default {
  0%, 20%, 80%, 100% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.5);
  }
}
         
         @-webkit-keyframes fadeOut {
            0% {opacity: 1;}
            100% {opacity: 0;}
         }
         
         @keyframes fadeOut {
            0% {opacity: 1;}
            100% {opacity: 0;}
         }
         
         .fadeOut {
            -webkit-animation-name: fadeOut;
            animation-name: fadeOut;
            animation-duration: 1s;
            animation-fill-mode: forwards;
         }


</style>

    <div class="d-flex justify-content-center align-items-center blurred-background" id="fullscreen-loader">
        {{-- <div class="spinner-border text-primary spinner-border-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div> --}}
        {{-- <div class="loader">Loading...</div> --}}

        <div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
    
<script>

window.addEventListener("load", () => {
  document.querySelector("#fullscreen-loader").classList.add("fadeOut")
  setTimeout(() => {
    document.querySelector("#fullscreen-loader").classList.add("d-none")
  }, 1000);
})

</script>




