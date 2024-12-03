<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-5 py-3 nice-blue border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:dark-blue focus:dark-blue active:dark-blue focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
