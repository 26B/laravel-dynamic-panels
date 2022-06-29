<div
    {{ $attributes }}
    x-data="{
        interval: {{ $interval }},
        loop() {
            if (this.interval === 0) {
                return;
            }

            setInterval(() => {
                $wire.next();
            }, this.interval)
        },
    }"
    x-init="loop"
>
    {{ $slot }}
</div>
