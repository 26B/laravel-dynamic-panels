<div
    {{ $attributes }}
    x-data="{
        interval: {{ $interval }},
        loop() {
            if (this.interval === 0) {
                return;
            }

            setInterval(() => {
                console.log('coio');
                $wire.next();
            }, this.interval)
        },
    }"
    x-init="loop"
>

    {{ $slot }}
</div>
