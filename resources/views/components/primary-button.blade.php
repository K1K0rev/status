<button {{ $attributes->merge(['type' => 'submit', 'style' => 'background-color']) }}>
    {{ $slot }}
</button>
