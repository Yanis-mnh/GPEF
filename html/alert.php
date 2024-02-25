<style>
    #confirmation{
        display: none;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 10px;
        position: absolute;
        left: 50%;
        top:50%;
        transform: translate(-50%,-50%);
        width:30%;
        height: 15%;
        right:0;
        background-color: #f1f1f1;
        border-radius:5px;
        padding:10px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
    
</style>

<div class="alert" id="confirmation">
    <h3>Do you want to delete this theme</h3>
    <div >
        <button id="yes" class='button'>Yes</button>
        <button id="no" class='button'  >NO</button>
    </div>
</div>

