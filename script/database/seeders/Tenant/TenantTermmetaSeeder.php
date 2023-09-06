<?php

namespace Database\Seeders\Tenant;

use Illuminate\Database\Seeder;
use App\Models\Termmeta;
use App\Models\Term;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class TenantTermmetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $product_descriptions = [
            '<p><strong>Backpacking</strong>, recreational activity of hiking while carrying clothing, food, and camping equipment in a pack on the back. Originally, in the early 20th century, backpacking was practiced in the wilderness as a means of getting to areas inaccessible by car or by day hike. It demands physical conditioning and practice, knowledge of camping and survival techniques, and selection of equipment of a minimum weight consistent with safety and comfort. In planning an excursion, the backpacker must take into consideration food and water, terrain, climate, and weather.</p>
            <p>Packs hang from the shoulders or are supported by a combination of straps around shoulders and waist or hips. Types range from the frameless rucksack, hung from two straps, and the frame rucksack, in which the pack is attached to a roughly rectangular frame hung on the shoulder straps, to the contour frame pack, with a frame of aluminum or magnesium tubing bent to follow the contour of the back. The Kelty-type pack, which is used with the contour frame, employs a waistband to transfer most of the weight of the pack to the hips.</p>
            <p><strong>Modern materials have revolutionized backpack construction, utility, and capacity. </strong></p>
            <p>The earliest packs were made from canvas, which, while strong and durable, added considerable weight for the backpacker to manage and lacked resistance to the elements. Today’s packs are constructed of nylon or similar lightweight materials and are usually at least partially waterproof.</p>',

            '<p><strong>Infinite</strong> is a multi-purpose blog-magazine script. It has clean, responsive and user-friendly design. You can manage your posts, custom pages, categories, user comments, advanced settings and contact messages with its powerful Admin panel. Also it has a useful ad management system. You can manage your ad spaces with this system. It is secured, seo optimized, fast and easy to use.</p>',

            '<p><strong>Varient</strong> is a multi-purpose news &amp; magazine script. It has clean, responsive and user-friendly design. You can manage almost everything in your site with its powerful Admin panel. It is multi-author system and all authors have their own panel to manage their posts. It has RSS aggregator system and you can use it as an autopilot script. It is secured, SEO optimized, fast and easy to use.</p>',

            '<p><strong>Backpacking</strong>, recreational activity of hiking while carrying clothing, food, and camping equipment in a pack on the back. Originally, in the early 20th century, backpacking was practiced in the wilderness as a means of getting to areas inaccessible by car or by day hike. It demands physical conditioning and practice, knowledge of camping and survival techniques, and selection of equipment of a minimum weight consistent with safety and comfort. In planning an excursion, the backpacker must take into consideration food and water, terrain, climate, and weather.</p>
            <p>Packs hang from the shoulders or are supported by a combination of straps around shoulders and waist or hips. Types range from the frameless rucksack, hung from two straps, and the frame rucksack, in which the pack is attached to a roughly rectangular frame hung on the shoulder straps, to the contour frame pack, with a frame of aluminum or magnesium tubing bent to follow the contour of the back. The Kelty-type pack, which is used with the contour frame, employs a waistband to transfer most of the weight of the pack to the hips.</p>
            <p><strong>Modern materials have revolutionized backpack construction, utility, and capacity. </strong></p>
            <p>The earliest packs were made from canvas, which, while strong and durable, added considerable weight for the backpacker to manage and lacked resistance to the elements. Today’s packs are constructed of nylon or similar lightweight materials and are usually at least partially waterproof.</p>',

            '<p><strong>Modern materials have revolutionized backpack construction, utility, and capacity.</strong></p>
            <p>The earliest packs were made from canvas, which, while strong and durable, added considerable weight for the backpacker to manage and lacked resistance to the elements. Today’s packs are constructed of nylon or similar lightweight materials and are usually at least partially waterproof.</p>
            <p>Clothing is weatherproof and insulating, including shell parkas, insulating underwear, down clothing, windpants, ponchos, sturdy waterproof boots with soles designed for maximum traction, and heavy socks. Tents may be a simple tarpaulin, a plastic sheeting tube, or a two-person nylon mountain tent. Sleeping bags of foam, dacron, or down and air mattresses or foam pads may be carried. Lightweight pots and pans and stoves are specially designed for backpacking; dehydrated food provides stew-type one-pot dishes.</p>
            <p>Backpackers must be able to read topographic maps and use a compass; they must also carry emergency food and first-aid equipment and be acquainted with survival techniques.</p>
            <p>In the later 20th century, backpacking became associated with travel, especially by students, outside the wilderness.</p>',

            '<p>Packs hang from the shoulders or are supported by a combination of straps around shoulders and waist or hips. Types range from the frameless rucksack, hung from two straps, and the frame rucksack, in which the pack is attached to a roughly rectangular frame hung on the shoulder straps, to the contour frame pack, with a frame of aluminum or magnesium tubing bent to follow the contour of the back. The Kelty-type pack, which is used with the contour frame, employs a waistband to transfer most of the weight of the pack to the hips.</p>
            <p><strong>Modern materials have revolutionized backpack construction, utility, and capacity. </strong></p>
            <p>The earliest packs were made from canvas, which, while strong and durable, added considerable weight for the backpacker to manage and lacked resistance to the elements. Today’s packs are constructed of nylon or similar lightweight materials and are usually at least partially waterproof.</p>',

            '<p>Couch, in modern usage a sofa or settee, but in the 17th and 18th centuries a long, upholstered seat for reclining, one end sloping and high enough to provide a back rest and headrest.</p>
            <p>Some late 18th-century versions had an arm running partly down one side, and this type continued to be made in England in the Regency period. Based on Greek prototypes, such flowing designs, of which there were many variations, were among the most elegant and successful interpretations of the classical revival. Many had scrolled ends and short, scimitar-shaped legs. The couch was superseded by the overstuffed sofa during the Victorian age.</p>',

            '<p>Packs hang from the shoulders or are supported by a combination of straps around shoulders and waist or hips. Types range from the frameless rucksack, hung from two straps, and the frame rucksack, in which the pack is attached to a roughly rectangular frame hung on the shoulder straps, to the contour frame pack, with a frame of aluminum or magnesium tubing bent to follow the contour of the back. The Kelty-type pack, which is used with the contour frame, employs a waistband to transfer most of the weight of the pack to the hips.</p>',

            '<p>Women sun dress</p>
            <p>Many scholars believe, however, that the first crude garments and ornaments worn by humans were designed not for utilitarian but for religious or ritual purposes. Other basic functions of dress include identifying the wearer and making the wearer appear more attractive.</p>
            <p>Although it is clear why such uses of dress developed and remain significant, it can often be difficult to determine how they are achieved. Some garments thought of as beautiful offer no protection whatsoever and may in fact even injure the wearer. Items that definitely identify one wearer can lose their meaning in another time and place.</p>',

            '<p>There are no simple answers to such questions, of course, and any one reason is influenced by a multitude of others, but certainly one of the most prevalent theories is that fashion evolved in conjunction with capitalism and the development of modern socioeconomic classes.</p>
            <p>Thus, in relatively static societies with limited movement between classes, as in many parts of Asia until modern times or in Europe before the Middle Ages, styles did not undergo a pattern of change. In contrast, when lower classes have the ability to copy upper classes, the upper classes quickly instigate fashion changes that demonstrate their authority and high position. During the 20th century, for example, improved communication and manufacturing technology enabled new styles to trickle down from the elite to the masses at ever faster speeds, with the result that fashion change accelerated.</p>',

            '<p><span xss="removed"><strong>Perhaps the most obvious function of dress is to provide warmth and protection.</strong></span></p>
            <p>Many scholars believe, however, that the first crude garments and ornaments worn by humans were designed not for utilitarian but for religious or ritual purposes. Other basic functions of dress include identifying the wearer and making the wearer appear more attractive.</p>
            <p>Although it is clear why such uses of dress developed and remain significant, it can often be difficult to determine how they are achieved. Some garments thought of as beautiful offer no protection whatsoever and may in fact even injure the wearer. Items that definitely identify one wearer can lose their meaning in another time and place.</p>
            <p>There are no simple answers to such questions, of course, and any one reason is influenced by a multitude of others, but certainly one of the most prevalent theories is that fashion evolved in conjunction with capitalism and the development of modern socioeconomic classes. Thus, in relatively static societies with limited movement between classes, as in many parts of Asia until modern times or in Europe before the Middle Ages, styles did not undergo a pattern of change. In contrast, when lower classes have the ability to copy upper classes, the upper classes quickly instigate fashion changes that demonstrate their authority and high position. During the 20th century, for example, improved communication and manufacturing technology enabled new styles to trickle down from the elite to the masses at ever faster speeds, with the result that fashion change accelerated.</p>
            <p>Furthermore, the idea that fashion is a reflection of wealth and prestige can be used to explain the popularity of many styles throughout costume history. For example, royal courts have been a major source of fashion in the West, where clothes that are difficult to obtain and expensive to maintain have frequently been at the forefront of fashion. Ruffs, for example, required servants to reset them with hot irons and starch every day and so were not generally worn by ordinary folk. As such garments become easier to buy and care for, they lose their exclusivity and hence much of their appeal. For the same reason, when fabrics or materials are rare or costly, styles that require them in excessive, extravagant amounts become particularly fashionable—as can be seen in the 16th-century vogue for slashing outer garments to reveal a second layer of luxurious fabric underneath.</p>',

            '<p>These shoes acquired the nickname \'plimsoll\' in the 1870s, derived according to Nicholette Jones\' book The Plimsoll Sensation, from the coloured horizontal band joining the upper to the sole, which resembled the Plimsoll line on a ship\'s hull. Alternatively, just like the Plimsoll line on a ship, if water got above the line of the rubber sole, the wearer would get wet.</p>
            <p>Plimsolls were widely worn by vacationers and also began to be worn by sportsmen on the tennis and croquet courts for their comfort. Special soles with engraved patterns to increase the surface grip of the shoe were developed, and these were ordered in bulk for the use of the British Army. Athletic shoes were increasingly used for leisure and outdoor activities at the turn of the 20th century - plimsolls were even found with the ill-fated Scott Antarctic expedition of 1911. Plimsolls were commonly worn by pupils in schools\' physical education lessons in the UK from the 1950s until the early 1970s.</p>',

            '<p>A sun hat is a head covering specifically designed to shade the face and shoulders from the sun. The sun hat incorporates a variety of materials and types, including the straw sun hat, pressed fiber sun hat, and the pith helmet (sun helmet. In modern times, sun hats are common in places around the world, mainly in holiday resorts residing in countries close to the Earth\'s equator. They are particularly useful in protecting against ultraviolet rays (UV. The style of a sun hat can range from small to large brims. However, as a general guideline, the brim is four to seven inches in width.</p>',

            '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. </p>',

            '<p>These shoes acquired the nickname \'plimsoll\' in the 1870s, derived according to Nicholette Jones\' book The Plimsoll Sensation, from the coloured horizontal band joining the upper to the sole, which resembled the Plimsoll line on a ship\'s hull. Alternatively, just like the Plimsoll line on a ship, if water got above the line of the rubber sole, the wearer would get wet.</p>
            <p>Plimsolls were widely worn by vacationers and also began to be worn by sportsmen on the tennis and croquet courts for their comfort. Special soles with engraved patterns to increase the surface grip of the shoe were developed, and these were ordered in bulk for the use of the British Army. Athletic shoes were increasingly used for leisure and outdoor activities at the turn of the 20th century - plimsolls were even found with the ill-fated Scott Antarctic expedition of 1911. Plimsolls were commonly worn by pupils in schools\' physical education lessons in the UK from the 1950s until the early 1970s.</p>',

            '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.</p>',

            '<p><span xss="removed"><strong>Women casual dress</strong></span></p>
            <p>Many scholars believe, however, that the first crude garments and ornaments worn by humans were designed not for utilitarian but for religious or ritual purposes. Other basic functions of dress include identifying the wearer and making the wearer appear more attractive.</p>
            <p>Although it is clear why such uses of dress developed and remain significant, it can often be difficult to determine how they are achieved. Some garments thought of as beautiful offer no protection whatsoever and may in fact even injure the wearer. Items that definitely identify one wearer can lose their meaning in another time and place.</p>
            <p>There are no simple answers to such questions, of course, and any one reason is influenced by a multitude of others, but certainly one of the most prevalent theories is that fashion evolved in conjunction with capitalism and the development of modern socioeconomic classes. Thus, in relatively static societies with limited movement between classes, as in many parts of Asia until modern times or in Europe before the Middle Ages, styles did not undergo a pattern of change. In contrast, when lower classes have the ability to copy upper classes, the upper classes quickly instigate fashion changes that demonstrate their authority and high position. During the 20th century, for example, improved communication and manufacturing technology enabled new styles to trickle down from the elite to the masses at ever faster speeds, with the result that fashion change accelerated.</p>
            <p>Furthermore, the idea that fashion is a reflection of wealth and prestige can be used to explain the popularity of many styles throughout costume history. For example, royal courts have been a major source of fashion in the West, where clothes that are difficult to obtain and expensive to maintain have frequently been at the forefront of fashion. Ruffs, for example, required servants to reset them with hot irons and starch every day and so were not generally worn by ordinary folk. As such garments become easier to buy and care for, they lose their exclusivity and hence much of their appeal. For the same reason, when fabrics or materials are rare or costly, styles that require them in excessive, extravagant amounts become particularly fashionable—as can be seen in the 16th-century vogue for slashing outer garments to reveal a second layer of luxurious fabric underneath.</p>',

            '<p>Cras sed sagittis lectus. Nunc gravida nulla est, sit amet dignissim neque placerat a. Proin eu interdum urna. Duis vitae luctus orci. Aenean molestie dolor ante, vitae dictum nunc interdum ut. Duis eget rhoncus libero. Donec dapibus consectetur arcu quis finibus. Ut et semper tortor. Donec convallis hendrerit ullamcorper. Quisque at nibh vel nisl tincidunt vulputate. Mauris a tortor tristique, sodales massa vel, blandit mi.</p>',

            '<p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.</p>
            <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.</p>',

            '<p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.</p>',

            '<p>A T-shirt is a style of fabric shirt named after the T shape of its body and sleeves. Traditionally it has short sleeves and a round neckline, known as a crew neck, which lacks a collar. T-shirts are generally made of a stretchy, light and inexpensive fabric and are easy to clean.</p>
            <p>Typically made of cotton textile in a stockinette or jersey knit, it has a distinctively pliable texture compared to shirts made of woven cloth. Some modern versions have a body made from a continuously knitted tube, produced on a circular knitting machine, such that the torso has no side seams. The manufacture of T-shirts has become highly automated and may include cutting fabric with a laser or a water jet.</p>
            <p>The T-shirt evolved from undergarments used in the 19th century and, in the mid-20th century, transitioned from undergarment to general-use casual clothing.</p>
            <p>A V-neck T-shirt has a V-shaped neckline, as opposed to the round neckline of the more common crew neck shirt (also called a U-neck. V-necks were introduced so that the neckline of the shirt does not show when worn beneath an outer shirt, as would that of a crew neck shirt.</p>',

            '<p><span xss="removed">Silk scarves were used by pilots of early aircraft in order to keep oily smoke from the exhaust out of their mouths while flying. These were worn by pilots of closed cockpit aircraft to prevent neck chafing, especially by fighter pilots, who were constantly turning their heads from side to side watching for enemy aircraft. Today, military flight crews wear scarves imprinted with unit insignia and emblems not for functional reasons but instead for esprit-de-corps and heritage.</span></p>',

            '<p><strong>Plants </strong>are mainly multicellular, predominantly photosynthetic eukaryotes of the kingdom Plantae. Historically, plants were treated as one of two kingdoms including all living things that were not animals, and all algae and fungi were treated as plants. However, all current definitions of Plantae exclude the fungi and some algae, as well as the prokaryotes (the archaea and bacteria. By one definition, plants form the clade Viridiplantae (Latin name for "green plants", a group that includes the flowering plants, conifers and other gymnosperms, ferns and their allies, hornworts, liverworts, mosses and the green algae, but excludes the red and brown algae.</p>
            <p>Green plants obtain most of their energy from sunlight via photosynthesis by primary chloroplasts that are derived from endosymbiosis with cyanobacteria. Their chloroplasts contain chlorophylls a and b, which gives them their green color. Some plants are parasitic or mycotrophic and have lost the ability to produce normal amounts of chlorophyll or to photosynthesize. Plants are characterized by sexual reproduction and alternation of generations, although asexual reproduction is also common.</p>
            <p>There are about 320,000 species of plants, of which the great majority, some 260–290 thousand, produce seeds.[5] Green plants provide a substantial proportion of the world\'s molecular oxygen,[6] and are the basis of most of Earth\'s ecosystems. Plants that produce grain, fruit and vegetables also form basic human foods and have been domesticated for millennia. Plants have many cultural and other uses, as ornaments, building materials, writing material and, in great variety, they have been the source of medicines and psychoactive drugs. The scientific study of plants is known as botany, a branch of biology.</p>',

            '<p><strong>Plants </strong>are mainly multicellular, predominantly photosynthetic eukaryotes of the kingdom Plantae. Historically, plants were treated as one of two kingdoms including all living things that were not animals, and all algae and fungi were treated as plants. However, all current definitions of Plantae exclude the fungi and some algae, as well as the prokaryotes (the archaea and bacteria. By one definition, plants form the clade Viridiplantae (Latin name for "green plants", a group that includes the flowering plants, conifers and other gymnosperms, ferns and their allies, hornworts, liverworts, mosses and the green algae, but excludes the red and brown algae.</p>
            <p>Green plants obtain most of their energy from sunlight via photosynthesis by primary chloroplasts that are derived from endosymbiosis with cyanobacteria. Their chloroplasts contain chlorophylls a and b, which gives them their green color. Some plants are parasitic or mycotrophic and have lost the ability to produce normal amounts of chlorophyll or to photosynthesize. Plants are characterized by sexual reproduction and alternation of generations, although asexual reproduction is also common.</p>
            <p>There are about 320,000 species of plants, of which the great majority, some 260–290 thousand, produce seeds.[5] Green plants provide a substantial proportion of the world\'s molecular oxygen,[6] and are the basis of most of Earth\'s ecosystems. Plants that produce grain, fruit and vegetables also form basic human foods and have been domesticated for millennia. Plants have many cultural and other uses, as ornaments, building materials, writing material and, in great variety, they have been the source of medicines and psychoactive drugs. The scientific study of plants is known as botany, a branch of biology.</p>',

            '<p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.</p>',

            '<p><strong>Perhaps the most obvious function of dress is to provide warmth and protection.</strong></p>
            <p>Many scholars believe, however, that the first crude garments and ornaments worn by humans were designed not for utilitarian but for religious or ritual purposes. Other basic functions of dress include identifying the wearer and making the wearer appear more attractive.</p>
            <p>Although it is clear why such uses of dress developed and remain significant, it can often be difficult to determine how they are achieved. Some garments thought of as beautiful offer no protection whatsoever and may in fact even injure the wearer. Items that definitely identify one wearer can lose their meaning in another time and place.</p>
            <p>There are no simple answers to such questions, of course, and any one reason is influenced by a multitude of others, but certainly one of the most prevalent theories is that fashion evolved in conjunction with capitalism and the development of modern socioeconomic classes. Thus, in relatively static societies with limited movement between classes, as in many parts of Asia until modern times or in Europe before the Middle Ages, styles did not undergo a pattern of change. In contrast, when lower classes have the ability to copy upper classes, the upper classes quickly instigate fashion changes that demonstrate their authority and high position. During the 20th century, for example, improved communication and manufacturing technology enabled new styles to trickle down from the elite to the masses at ever faster speeds, with the result that fashion change accelerated.</p>',

            '<p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pain</p>',

            '<p><strong>Sneakers</strong> are shoes primarily designed for sports or other forms of physical exercise, but which are now also widely used for everyday casual wear.</p>
            <p>The shoes have gone by a variety of names, depending on geography, and changing over the decades. The term "sneakers" is most commonly used in the Northeastern United States, South Florida and Central Florida, parts of Canada and New Zealand. The British English equivalent of "sneaker" in its modern form is "trainer". In some urban areas in the United States, the slang for sneakers is kicks. Other terms include training shoes or trainers (Britain, sandshoes, gym boots or joggers (Geordie English in the UK and Australian English, running shoes, runners or gutties (Canada, Australia and Scotland, daps in Wales, runners in Hiberno-English, sneakers (North America, New Zealand and Australia, tennis shoes (North American and Australia, gym shoes, tennies, sports shoes, sneaks, takkies.</p>',

            '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.</p>
            <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like.</p>',

            '<p>Recreational activity of hiking while carrying clothing, food, and camping equipment in a pack on the back. Originally, in the early 20th century, backpacking was practiced in the wilderness as a means of getting to areas inaccessible by car or by day hike. It demands physical conditioning and practice, knowledge of camping and survival techniques, and selection of equipment of a minimum weight consistent with safety and comfort. In planning an excursion, the backpacker must take into consideration food and water, terrain, climate, and weather.</p>',

            '<p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pain</p>',

            '<p><span>Silk scarves were used by pilots of early aircraft in order to keep oily smoke from the exhaust out of their mouths while flying. These were worn by pilots of closed cockpit aircraft to prevent neck chafing, especially by fighter pilots, who were constantly turning their heads from side to side watching for enemy aircraft. Today, military flight crews wear scarves imprinted with unit insignia and emblems not for functional reasons but instead for esprit-de-corps and heritage.</span></p>',

            '<p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.</p>
            <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.</p>',

            '<p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.</p>
            <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.</p>',

            '<p><span xss="removed">When our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. </span></p>
            <p><span xss="removed">The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains</span></p>',

            '<p><span><strong>Women sun dress</strong></span></p>
            <p>Many scholars believe, however, that the first crude garments and ornaments worn by humans were designed not for utilitarian but for religious or ritual purposes. Other basic functions of dress include identifying the wearer and making the wearer appear more attractive.</p>
            <p>Although it is clear why such uses of dress developed and remain significant, it can often be difficult to determine how they are achieved. Some garments thought of as beautiful offer no protection whatsoever and may in fact even injure the wearer. Items that definitely identify one wearer can lose their meaning in another time and place.</p>
            <p>There are no simple answers to such questions, of course, and any one reason is influenced by a multitude of others, but certainly one of the most prevalent theories is that fashion evolved in conjunction with capitalism and the development of modern socioeconomic classes. Thus, in relatively static societies with limited movement between classes, as in many parts of Asia until modern times or in Europe before the Middle Ages, styles did not undergo a pattern of change. In contrast, when lower classes have the ability to copy upper classes, the upper classes quickly instigate fashion changes that demonstrate their authority and high position. During the 20th century, for example, improved communication and manufacturing technology enabled new styles to trickle down from the elite to the masses at ever faster speeds, with the result that fashion change accelerated.</p>',

            '<p><span xss="removed">When our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. </span></p>
            <p><span xss="removed">The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains</span></p>',

            '<p>To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure.</p>',

            '<p>Backpacking, recreational activity of hiking while carrying clothing, food, and camping equipment in a pack on the back. Originally, in the early 20th century, backpacking was practiced in the wilderness as a means of getting to areas inaccessible by car or by day hike. It demands physical conditioning and practice, knowledge of camping and survival techniques, and selection of equipment of a minimum weight consistent with safety and comfort. In planning an excursion, the backpacker must take into consideration food and water, terrain, climate, and weather.</p>
            <p>Packs hang from the shoulders or are supported by a combination of straps around shoulders and waist or hips. Types range from the frameless rucksack, hung from two straps, and the frame rucksack, in which the pack is attached to a roughly rectangular frame hung on the shoulder straps, to the contour frame pack, with a frame of aluminum or magnesium tubing bent to follow the contour of the back. The Kelty-type pack, which is used with the contour frame, employs a waistband to transfer most of the weight of the pack to the hips.</p>',

            '<p>Many scholars believe, however, that the first crude garments and ornaments worn by humans were designed not for utilitarian but for religious or ritual purposes. Other basic functions of dress include identifying the wearer and making the wearer appear more attractive. Although it is clear why such uses of dress developed and remain significant, it can often be difficult to determine how they are achieved. Some garments thought of as beautiful offer no protection whatsoever and may in fact even injure the wearer. Items that definitely identify one wearer can lose their meaning in another time and place.</p>
            <p>There are no simple answers to such questions, of course, and any one reason is influenced by a multitude of others, but certainly one of the most prevalent theories is that fashion evolved in conjunction with capitalism and the development of modern socioeconomic classes. Thus, in relatively static societies with limited movement between classes, as in many parts of Asia until modern times or in Europe before the Middle Ages, styles did not undergo a pattern of change. In contrast, when lower classes have the ability to copy upper classes, the upper classes quickly instigate fashion changes that demonstrate their authority and high position. During the 20th century, for example, improved communication and manufacturing technology enabled new styles to trickle down from the elite to the masses at ever faster speeds, with the result that fashion change accelerated.</p>',

            '<p>Backpacking, recreational activity of hiking while carrying clothing, food, and camping equipment in a pack on the back. Originally, in the early 20th century, backpacking was practiced in the wilderness as a means of getting to areas inaccessible by car or by day hike. It demands physical conditioning and practice, knowledge of camping and survival techniques, and selection of equipment of a minimum weight consistent with safety and comfort. In planning an excursion, the backpacker must take into consideration food and water, terrain, climate, and weather.</p>
            <p>Packs hang from the shoulders or are supported by a combination of straps around shoulders and waist or hips. Types range from the frameless rucksack, hung from two straps, and the frame rucksack, in which the pack is attached to a roughly rectangular frame hung on the shoulder straps, to the contour frame pack, with a frame of aluminum or magnesium tubing bent to follow the contour of the back.</p>',

            '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>',

            '<p>Many scholars believe, however, that the first crude garments and ornaments worn by humans were designed not for utilitarian but for religious or ritual purposes. Other basic functions of dress include identifying the wearer and making the wearer appear more attractive.</p>
            <p>Although it is clear why such uses of dress developed and remain significant, it can often be difficult to determine how they are achieved. Some garments thought of as beautiful offer no protection whatsoever and may in fact even injure the wearer. Items that definitely identify one wearer can lose their meaning in another time and place.</p>
            <p>There are no simple answers to such questions, of course, and any one reason is influenced by a multitude of others, but certainly one of the most prevalent theories is that fashion evolved in conjunction with capitalism and the development of modern socioeconomic classes. Thus, in relatively static societies with limited movement between classes, as in many parts of Asia until modern times or in Europe before the Middle Ages, styles did not undergo a pattern of change. In contrast, when lower classes have the ability to copy upper classes, the upper classes quickly instigate fashion changes that demonstrate their authority and high position. During the 20th century, for example, improved communication and manufacturing technology enabled new styles to trickle down from the elite to the masses at ever faster speeds, with the result that fashion change accelerated.</p>',

            '<p><span xss="removed"><strong>Womens ankle boot</strong></span></p>
            <p><strong>Boots </strong>are shoes primarily designed for sports or other forms of physical exercise, but which are now also widely used for everyday casual wear.</p>
            <p>These shoes acquired the nickname \'plimsoll\' in the 1870s, derived according to Nicholette Jones\' book The Plimsoll Sensation, from the coloured horizontal band joining the upper to the sole, which resembled the Plimsoll line on a ship\'s hull. Alternatively, just like the Plimsoll line on a ship, if water got above the line of the rubber sole, the wearer would get wet.</p>
            <p>Plimsolls were widely worn by vacationers and also began to be worn by sportsmen on the tennis and croquet courts for their comfort. Special soles with engraved patterns to increase the surface grip of the shoe were developed, and these were ordered in bulk for the use of the British Army. Athletic shoes were increasingly used for leisure and outdoor activities at the turn of the 20th century - plimsolls were even found with the ill-fated Scott Antarctic expedition of 1911. Plimsolls were commonly worn by pupils in schools\' physical education lessons in the UK from the 1950s until the early 1970s.</p>',

            '<p><span>In cold climates, a thick knitted scarf (sometimes known as a "muffler", often made of wool, is tied around the neck to keep warm. This is usually accompanied by a heavy jacket or coat. Also, the scarf could be used to wrap around the face and ears for additional cover from the cold.</span></p>
            <p><span>In drier, dustier warm climates, or in environments where there are many airborne contaminants, a thin headscarf, kerchief, or bandanna is often worn over the eyes and nose and mouth to keep the hair clean. Over time, this custom has evolved into a fashionable item in many cultures, particularly among women. The cravat, an ancestor of the necktie and bow tie, evolved from scarves of this sort in Croatia.</span></p>
            <p><span>Scarves that are used to cover the lower part of face are sometimes called a cowl. Scarves can be colloquially called a neck-wrap.</span></p>
            <p><span>Scarfs can be tied in many ways including the pussy-cat bow, the square knot, the cowboy bib, the ascot knot, the loop, the necktie, and the gypsy kerchief. Scarfs can also be tied in various ways on the head.</span></p>'
        ];

        $descriptionsCount = count($product_descriptions);

        $blog_posts = [
            '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>',
            '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>',
            '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>',
            '<p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
            <p>To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure? These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains</p>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>',
            '<p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>
            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.</p>
            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>',
            '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>',
            '<p>Denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.</p>
            <p>The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. </p>',
            '<p>In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>
            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.</p>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>',
        ];

        $blogPostsCount = count($blog_posts);


        $product_seo_tags = [
            'nylon, unisex, backpack',
            'script, design, theme',
            'script, design, theme',
            'gold, fashion, backpack',
            'clothing, revolutionized, construction',
            'black, leather, handbag',
            'comfort, pillow, couch',
            'handbag, handmade',
            'fashion, lace',
            'casual, dress',
            'women, shirt, blue',
            'sneakers, black',
            'women, protection, cap',
            'variations, passages',
            'shoes, sneakers',
            'inspiration, piano music',
            'casual, dress',
            'animation, purple background',
            'animals, photo, pack',
            'righteous, dislike, beguiled',
            'men, t-shirt',
            'daily, unisex, shoes',
            'plants, house',
            'plants, house',
            'daily, unisex, shoes',
            'blouse, colors, different',
            'landscape, animation',
            'shoes, sneakers',
            'racing',
            'handbag, modern',
            'popular,vacation, spots',
            'formal, casual, fashion',
            'outerwear, navy, color',
            'royalty, free, image',
            'brown, ankle, bootie',
            'women, sundress',
            'colorful, digital, prints',
            'shoes, sneakers',
            'bailey, handbag',
            'skirt, flowers, white',
            'fashion, backpack',
            'couch, pillows',
            'polka, dress',
            'brown, ankle, bootie',
            'scarfs, women'
        ];

        $productSeoTagsCount = count($product_seo_tags);

        $blog_seo_tags = [
            'variations, passages, available',
            'generators, predefined',
            'packages, editors',
            'circumstances, owing',
            'advantages , expression',
            'variations, passages, available',
            'evolved, versions',
            'have, near'
        ];

        $blogSeoTagsCount = count($blog_seo_tags);


        $termmetaData = [];

        // PRODUCTS SECTION
        $products = Term::where('type', 'product')->get();
        foreach ($products as $index => $product) {
            $termId = $product->id;

            $galleryFilesNames = $this->getRandomGalleryFiles('/dummy/product', $index, 4);
            $randomFile = getRandomFileUrl('/dummy/product', $index);
            $description = $product_descriptions[$index % $descriptionsCount];

            $tags = $product_seo_tags[$index % $productSeoTagsCount];

            $termmetaData[] = $this->createTermmetaItem($termId, 'preview', $randomFile);
            $termmetaData[] = $this->createTermmetaItem($termId, 'excerpt', Str::limit(strip_tags($description), 50));
            $termmetaData[] = $this->createTermmetaItem($termId, 'description', $description);
            $termmetaData[] = $this->createTermmetaItem($termId, 'seo', [
                'preview' => $randomFile,
                'title' => $product->title,
                'tags' => $tags,
                'description' => Str::limit(strip_tags($description), 100)
            ]);
            $termmetaData[] = $this->createTermmetaItem($termId, 'gallery', json_encode($galleryFilesNames));
        }

        // BLOGS SECTION
        $blogs = Term::where('type', 'blog')->get();
        foreach ($blogs as $index => $blog) {
            $termId = $blog->id;

            $previewUrl = getRandomFileUrl('/dummy/blog', $index);
            $thumbUrl = getRandomFileUrl('/dummy/blog/thumb', $index);

            $description = $product_descriptions[$index % $blogPostsCount];

            $tags = $blog_seo_tags[$index % $blogSeoTagsCount];

            $termmetaData[] = $this->createTermmetaItem($termId, 'preview', $previewUrl);
            $termmetaData[] = $this->createTermmetaItem($termId, 'thum_image', $thumbUrl);
            $termmetaData[] = $this->createTermmetaItem($termId, 'excerpt', Str::limit(strip_tags($description), 50));
            $termmetaData[] = $this->createTermmetaItem($termId, 'description', $description);
            $termmetaData[] = $this->createTermmetaItem($termId, 'seo', [
                'preview' => $previewUrl,
                'title' => $blog->title,
                'tags' => $tags,
                'description' => Str::limit(strip_tags($description), 100)
            ]);
        }

        // PAGES SECTION
        $pages = Term::where('type', 'page')->get();
        foreach ($pages as $page) {
            $termId = $page->id;

            $metaValue = [
                'page_excerpt' => 'Lorem Ipsum is simply dummy text...',
                'page_content' => 'Lorem Ipsum is simply dummy text...'
            ];

            $termmetaData[] = $this->createTermmetaItem($termId, 'meta', json_encode($metaValue));
        }

        Termmeta::insert($termmetaData);
    }


    // Helper functions
    protected function getRandomFileUrl($directory, $index)
    {
        $files = File::allFiles(uploads_path($directory));
        $currentFileIndex = ($index - 0) % count($files);
        $randomFile = $files[$currentFileIndex]->getRelativePathname();
        return env('APP_URL') . "/uploads$dummy$product/$randomFile";
    }

    protected function getRandomGalleryFiles($directory, $index, $count)
    {
        $files = File::allFiles(uploads_path($directory));
        $currentFileIndex = ($index - 0) % count($files);
        $galleryFiles = array_slice($files, $currentFileIndex + 1, $count);
        return array_map(function ($fileInfo) {
            $prefix = '/uploads/dummy/product/';
            $relativePathname = $fileInfo->getRelativePathname();
            return $prefix . $relativePathname;
        }, $galleryFiles);
    }

    protected function createTermmetaItem($termId, $key, $value)
    {
        return [
            'term_id' => $termId,
            'key' => $key,
            'value' => is_array($value) ? json_encode($value) : $value
        ];
    }
}

