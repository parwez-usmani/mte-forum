<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                {{-- <div class="img_cls circle">
                    <img src="assets/img/locked.png" alt="" srcset="">
                    <i class="fa fa-lock" style="font-size:48px;color:gray"></i>
                </div> --}}
                <div class="circle"><i class="fa fa-lock" style="font-size:48px;color:gray;    padding-top: 24%;opacity: 0.5;"></i></div>
                {{-- <button style="font-size:48px;color:gray;border-radius:50%;border-color:gray"><i class="fa fa-lock"></i></button> --}}

                <div class="error-deny">
                    <p class="access">Access Denied</p>
                    {{-- <h1>Access Denied</h1> --}}
                </div>
                <div class="error-details">
                    <p class="details"> You don't have permission to access this page.<br>
                        Contact an administrator to get permissions or go to the home page and browse other page.</p>
                   
                </div>
                <div class="error-actions">
                    <a href="{{route('dashboard.index')}}" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Take Me Home 
                    </a>
                    <a href="#" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body { 
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMC8yOS8xMiKqq3kAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAABHklEQVRIib2Vyw6EIAxFW5idr///Qx9sfG3pLEyJ3tAwi5EmBqRo7vHawiEEERHS6x7MTMxMVv6+z3tPMUYSkfTM/R0fEaG2bbMv+Gc4nZzn+dN4HAcREa3r+hi3bcuu68jLskhVIlW073tWaYlQ9+F9IpqmSfq+fwskhdO/AwmUTJXrOuaRQNeRkOd5lq7rXmS5InmERKoER/QMvUAPlZDHcZRhGN4CSeGY+aHMqgcks5RrHv/eeh455x5KrMq2yHQdibDO6ncG/KZWL7M8xDyS1/MIO0NJqdULLS81X6/X6aR0nqBSJcPeZnlZrzN477NKURn2Nus8sjzmEII0TfMiyxUuxphVWjpJkbx0btUnshRihVv70Bv8ItXq6Asoi/ZiCbU6YgAAAABJRU5ErkJggg==);
    }
.error-template {padding: 15% 15px;text-align: center;}
.error-actions {margin-top:15px;margin-bottom:15px;}
.error-actions .btn { margin-right:10px; }
img {
    height: 50%;
}
.circle {
    width: 100px;
    height: 100px;
    border-radius: 50px;
    color: #fff;
    border-color: #DCDCDC;
    border-style: solid;
    margin-left: 45%;
}
.access{
    font-size: 43px;
    font-weight: bolder;
    font-family: monospace;
}
.details {
    font-size: 16px;
    color: #888888;
    font-family: sans-serif;
}
</style>