<div>
    <div style="width: 100%;">
        <div style="float:left">
            <p>Date: <?php echo date("Y/m/d"); ?></p>
            <p>Delivery date: <?php echo date("Y/m/d"); ?></p>
            <div>
                {!! DNS1D::getBarcodeHTML('12345', 'UPCA') !!}
                {{ $label->packageId }}
            </div>
            <p>Webshop {{ $package->first()->shop }}</p>
            <p>{{ $deliveryInfo['statement'] }} at {{$label->deliveryDate}}</p>
            <p>
                {{ $deliveryInfo['where'] }}<br/>
                {{ $deliveryInfo['city'] }}<br/>
                {{ $deliveryInfo['street'] }} {{ $deliveryInfo['housenumber'] }}
            </p>
        </div>
        <div style="float:right">
            <p>{{ $package->first()->firstname }} {{ $package->first()->surname }}</p>
            <p>{{ $package->first()->email }}</p>
        </div>
    </div>
    
</div>