<div>
    <div style="width: 100%;">
        <div style="float:left">
            <p>Date: <?php echo date("Y/m/d"); ?></p>
            <p>Delivery date: <?php echo date("Y/m/d"); ?></p>
            {!! DNS1D::getBarcodeHTML('12345', 'UPCA') !!}
            {{ $label->packageId }}
            <p>Webshop {{ $label->shop }}</p>
        </div>
        <div style="float:right">
            <p>{{ $package->first()->firstname }} {{ $package->first()->surname }}</p>
            <p>{{ $package->first()->email }}</p>
        </div>
    </div>
    
</div>