<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create([
            'title' => 'Táblajáték', 'description' => 'Az emberiség legnagyobb szellemi alkotásai közé tartoznak a táblajátékok, melyek szoros kapcsolatban vannak a matematikával, logikával. A tic-tac-toe játékot már az Ókori Egyiptomban is játszották.
            Táblajátékok előnye a gyerekek és felnőttek értelmi képességének fejlesztése, a szabadidő igényes, tartalmas eltöltése, a társas élet erősítése, a probléma megoldásra nevelés.'
        ]);
        Topic::create([
            'title' => 'Stratégiai', 'description' => 'Egy társasjátékban a győzelem alapulhat szerencsén, stratégián, vagy a kettő keverékén.
            A stratégiai társasjáték jellemzője, hogy előre gondolkodást és tervezést igényel a győzelem eléréséhez. A játék kimenetele a stratégiai játékok esetén nem a szerencsén, hanem a játékosok képességén múlik.'
        ]);
        Topic::create([
            'title' => 'Logikai', 'description' => 'Agyat tornáztató, gondolkodtató játékot keresel? Akkor válassz logikai társasjátékot! 
            Rengeteg egyedül játszós logikai játékból választhatnak a kínálatunkból, de akadnak társasjátékok is, aminek a játékmenetéhez valamilyen logikai gondolkodás szükséges, vagy akár a szabaduló játékoknál a logikai feladványok megoldása vezet a győzelemhez. '
        ]);
        Topic::create([
            'title' => 'Kvíz', 'description' => 'A kvíz játékokat mindenki szeretni. Hogy mi a kvíz társasjátékok titka? Talán az, hogy a kvíz játékok során tesztelhetjük magunkat, próbára tehetjük tudásunkat. Ha tudjuk a választ a kérdésre, az önbizalmat ad, megnyugtat, hogy képben vagyunk. Ha pedig nem tudjuk a választ, játszva tanulhatjuk meg a játék során.'
        ]);
        Topic::create([
            'title' => 'Ügyességi', 'description' => 'Nem szerettek óráig egyhelyben ücsörögni? Szívesen játszanátok valami olyan társasjátékkal, amely közben lehet mozogni? Esetleg a kertben, a teraszon is játszhattok vele? Akkor nektek az ügyességi társasjátékok valók. Ezek jellemzője az egyszerűen, gyorsan értelmezhető játékszabály és a könnyed igazán szórakoztató játékmenet.'
        ]);
        Topic::create([
            'title' => 'Beszélgetős', 'description' => 'Baráti társaságoknak, családoknak, pároknak ajánljuk leginkább a beszélgetős társasjátékokat, amely közben lehetőség nyílik jobban megismerni a másikat, játék közben kibeszélni a hétköznapi problémákat, majd megoldani őket. A tiniket a legnehezebb rávenni, hogy beszélgessenek a szülőkkel. A tapasztalat az, hogy egy beszélgetős társasjáték erre is megoldás lehet. '
        ]);
        Topic::create([
            'title' => 'Kooperatív', 'description' => 'A kooperatív játékokban nem egymás ellen játszunk, hanem egymást segítve kell győznünk a játék ellen. Fontos az együttműködés, a csapatmunka, az összedolgozás. A gyerekeknél sokszor előfordul, hogy a vereséget még nem tudják jól kezelni. Ezekkel a játékokkal talán könnyebben meg tudnak barátkozni a tudattal, hogy igenis van, amikor nem nyerünk. De ebben az esetben legalább együtt veszítünk. 
            Ha nem tud gyermeked veszíteni, próbáljátok ki egy kooperatív játékot! '
        ]);
    }
}
