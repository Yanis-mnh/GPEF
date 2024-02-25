<style>
@keyframes animate {
  0% {
    transform: translateY(calc(-130vh)); rotate(0deg);
    opacity: 1;
    border-radius: 50%;
  }
  100% {
    transform: translateY(0) rotate(720deg);
    opacity: 0;
    border-radius: 100%;
  }
}



.background {
    position: fixed;
    z-index: -1;
    width: 100vw;
    height: 100vh;
    top: 0;
    left: 0;
    margin: 0;
    padding: 0;
    background: var(--back-color);
    overflow: hidden;
}
.background li {
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 0 5px #444444;
    animation: animate 20s linear infinite;
}

.background li:nth-child(0) {
    left: 89%;
    width: 99px;
    height: 199px;
    bottom: -199px;
    background-color: black;
    animation-delay: .5s;
}
.background li:nth-child(1) {
    left: 59%;
    width: 150px;
    height: 150px;
    bottom: -150px;
    animation-delay: 2s;
}
.background li:nth-child(2) {
    left: 11%;
    width: 135px;
    height: 135px;
    bottom: -135px;
    animation-delay: 2s;
}
.background li:nth-child(3) {
    right: 2%;
    width: 104px;
    height: 104px;
    bottom: -104px;
    animation-delay: 6s;
}
.background li:nth-child(4) {
    left: 10%;
    width: 128px;
    height: 128px;
    bottom: -128px;
    animation-delay: 6s;
}
.background li:nth-child(5) {
    left: 18%;
    width: 155px;
    height: 155px;
    bottom: -155px;
    animation-delay: 10s;
}
.background li:nth-child(6) {
    left: 21%;
    width: 134px;
    height: 134px;
    bottom: -134px;
    animation-delay: 2.5s;
}
.background li:nth-child(7) {
    left: 51%;
    width: 159px;
    height: 159px;
    bottom: -159px;
    animation-delay: 17s;
}
.background li:nth-child(8) {
    left: 42%;
    width: 178px;
    height: 178px;
    bottom: -178px;
    animation-delay: 13s;
}
.background li:nth-child(9) {
    left: 43%;
    width: 113px;
    height: 113px;
    bottom: -113px;
    animation-delay: 8s;
}
</style>

<ul class="background">
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
</ul>
