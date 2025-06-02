<template>
    <div class="flex lg:flex-row justify-between gap-4 lg:gap-0 px-8 py-4">
        <!-- Контакты и адрес -->
        <div class="w-full lg:w-max flex flex-col sm:flex-row gap-3 sm:gap-4 lg:gap-8 justify-start">
            <!-- Телефон -->
            <div class="flex items-center gap-2">
                <img src="/images/icons/phone/phone_dark.png" 
                     alt="Телефон" 
                     class="w-auto h-6 lg:h-6">
                <a href="tel:+70000000000" class="text-sm sm:text-base hover:text-primary transition-colors">
                    +7 (000) 000-00-00
                </a>
            </div>
            
            <!-- Адрес -->
            <div class="flex items-center gap-2 flex-shrink-0">
                <img src="/images/icons/map/map_dark.png" 
                     alt="Местоположение" 
                     class="w-auto h-6 lg:h-6">
                <span class="text-sm sm:text-base truncate max-w-[180px] sm:max-w-none">
                    Город, название улицы, дом 1
                </span>
            </div>
        </div>
        
        <!-- Соцсети -->
        <div class="self-start sm:self-center">
            <a href="#" aria-label="Мы ВКонтакте">
                <img src="/images/social/vk.png" 
                     alt="Vk" 
                     class="w-8 h-7 lg:h-8 hover:opacity-80 transition-opacity">
            </a>
        </div>
    </div>
</template>