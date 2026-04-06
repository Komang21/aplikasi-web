<div {{ $attributes->merge(['class' => 'bg-white/10 dark:bg-glass-dark-bg backdrop-blur-glass border border-white/20 dark:border-glass-dark-border shadow-2xl rounded-3xl p-8 text-white dark:text-gray-100 transition-all duration-300 hover:shadow-3xl hover:scale-[1.02]']) }}>
    {{ $slot }}
</div>
