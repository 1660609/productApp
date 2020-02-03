<div class="col-3 col-md-3 col-lg-3 col-xl-3 float-left ml-1 option" >
    <h5 style="font-style: initial;"><strong>Option</strong></h5>
    <hr width="100%" style="background-color: black;">
    <h6>Manage personal information</h6>
    <ul class="" style="font-size-adjust: none;">
        <li>
            <a href="{{route('profileUser.show',Auth::user()->id)}}">
                <p>Edit personal information</p>
            </a>
        </li>
        <li>
            <a href="{{route('address.show',Auth::user()->id)}}"><p>Address management</p></a>
        </li>
    </ul>
    <h6>My order</h6>
    <ul>
        <li>
            <a href="">
                <p>Orders change</p>
            </a>
        </li>
        <li>
            <a href="">
                <p>Cancel orders</p>
            </a>
        </li>
    </ul>
</div>