<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sdg;
use App\Models\SdgTopic;

class SdgSeeder extends Seeder
{
    public function run(): void
    {
        $sdgs = [
            1 => [
                'title' => 'No Poverty',
                'overview' => 'End poverty in all its forms everywhere. The International Relations Office (IRO) contributes by facilitating inclusive international scholarships and partnering with global institutions to provide equitable access to education.',
                'topics' => [
                    'Collaborative Academic Programs' => 'Joint academic ventures focusing on economic development and research to uplift marginalized communities.',
                    'International Scholarship and Aid' => 'WMSU\'s efforts in securing grants, tuition waivers, and aid for financially disadvantaged international and local exchange students.',
                    'Cross-Border Community Projects' => 'Global community outreach and extension initiatives designed to provide essential services and livelihood training.',
                ],
            ],
            2 => [
                'title' => 'Zero Hunger',
                'overview' => 'End hunger, achieve food security and improved nutrition and promote sustainable agriculture.',
                'topics' => [
                    'Agricultural Exchange Programs' => 'Partnering with international agricultural universities to share best practices in farming and food production.',
                    'Food Security Research' => 'Collaborative international research focusing on resilient crop varieties and sustainable agricultural technologies.',
                    'Global Nutrition Symposia' => 'Hosting and participating in international conferences addressing global malnutrition and food systems.',
                ],
            ],
            3 => [
                'title' => 'Good Health and Well-being',
                'overview' => 'Ensure healthy lives and promote well-being for all at all ages.',
                'topics' => [
                    'Medical & Nursing Student Exchange' => 'Clinical rotations and observational internships for WMSU health sciences students in partner hospitals abroad.',
                    'Global Public Health Research' => 'Joint studies on tropical diseases, pandemic preparedness, and global health policies.',
                    'International Medical Missions' => 'Coordinating with foreign NGOs and universities to conduct joint medical and dental missions.',
                ],
            ],
            4 => [
                'title' => 'Quality Education',
                'overview' => 'Ensure inclusive and equitable quality education and promote lifelong learning opportunities for all.',
                'topics' => [
                    'Internationalization at Home' => 'Integrating global perspectives into the WMSU curriculum through virtual exchanges and international guest lecturers.',
                    'Faculty Mobility Programs' => 'Sending WMSU educators abroad for advanced studies and welcoming foreign professors to share their expertise.',
                    'Global Accreditation Initiatives' => 'Working towards international benchmarks and accreditations to elevate WMSU\'s educational standards globally.',
                ],
            ],
            5 => [
                'title' => 'Gender Equality',
                'overview' => 'Achieve gender equality and empower all women and girls.',
                'topics' => [
                    'Women in Global Leadership' => 'International seminars and mentorship programs focused on empowering female student leaders and faculty.',
                    'Gender-Inclusive Mobility' => 'Ensuring equal access and support for all genders participating in WMSU’s outbound exchange programs.',
                    'International Gender Studies' => 'Collaborative research and curriculum development on global gender issues and rights.',
                ],
            ],
            6 => [
                'title' => 'Clean Water and Sanitation',
                'overview' => 'Ensure availability and sustainable management of water and sanitation for all.',
                'topics' => [
                    'Water Management Tech Transfer' => 'Partnering with global engineering institutes to bring sustainable water purification technologies to local communities.',
                    'Joint Environmental Engineering Research' => 'Cross-border studies focusing on wastewater treatment and sustainable sanitation solutions.',
                    'Global WASH Initiatives' => 'Participating in international Water, Sanitation, and Hygiene (WASH) advocacy networks.',
                ],
            ],
            7 => [
                'title' => 'Affordable and Clean Energy',
                'overview' => 'Ensure access to affordable, reliable, sustainable and modern energy for all.',
                'topics' => [
                    'Renewable Energy Partnerships' => 'Collaborating with foreign universities known for green energy programs to develop local solar and wind projects.',
                    'Green Tech Innovation Forums' => 'International student competitions and symposiums focused on clean energy innovations.',
                    'Campus Sustainability Exchange' => 'Learning from global partners to implement energy-efficient practices within the WMSU campus.',
                ],
            ],
            8 => [
                'title' => 'Decent Work and Economic Growth',
                'overview' => 'Promote sustained, inclusive and sustainable economic growth, full and productive employment and decent work for all.',
                'topics' => [
                    'Global Internship Programs' => 'Facilitating international OJT (On-the-Job Training) placements for WMSU students to gain global industry experience.',
                    'International Entrepreneurship' => 'Cross-border startup incubators and business pitch competitions with partner universities.',
                    'Global Labor Market Research' => 'Joint studies on preparing graduates for the demands of the international workforce.',
                ],
            ],
            9 => [
                'title' => 'Industry, Innovation and Infrastructure',
                'overview' => 'Build resilient infrastructure, promote inclusive and sustainable industrialization and foster innovation.',
                'topics' => [
                    'Global Tech Incubators' => 'Connecting WMSU researchers with international tech hubs to commercialize innovations.',
                    'Joint Engineering Capstones' => 'Collaborative projects where WMSU students work with international peers on sustainable infrastructure designs.',
                    'Industry-Academe Global Linkages' => 'Partnering with multinational corporations to provide state-of-the-art learning facilities and research grants.',
                ],
            ],
            10 => [
                'title' => 'Reduced Inequalities',
                'overview' => 'Reduce inequality within and among countries.',
                'topics' => [
                    'Inclusive Global Mobility' => 'Creating targeted mobility grants to ensure minority and low-income students can participate in international programs.',
                    'Cross-Cultural Solidarity Forums' => 'Hosting international dialogues that promote understanding and reduce discrimination and bias.',
                    'Global Policy Advocacy' => 'Collaborating with international bodies to research and advocate for equitable educational policies.',
                ],
            ],
            11 => [
                'title' => 'Sustainable Cities and Communities',
                'overview' => 'Make cities and human settlements inclusive, safe, resilient and sustainable.',
                'topics' => [
                    'Urban Planning Exchanges' => 'Sending WMSU architecture and engineering students to study smart cities and sustainable urban development abroad.',
                    'Cultural Heritage Preservation' => 'Partnering with international organizations to preserve and promote local Zamboangueño heritage on a global stage.',
                    'Disaster Resilience Research' => 'Joint international studies on climate-resilient community planning and disaster risk reduction.',
                ],
            ],
            12 => [
                'title' => 'Responsible Consumption and Production',
                'overview' => 'Ensure sustainable consumption and production patterns.',
                'topics' => [
                    'Global Circular Economy Networks' => 'Participating in international university coalitions focused on zero-waste campus initiatives.',
                    'Sustainable Supply Chain Research' => 'Collaborative business and economics research on global sustainable trade practices.',
                    'Eco-Friendly Campus Linkages' => 'Sharing best practices with foreign universities on reducing institutional carbon footprints and plastic use.',
                ],
            ],
            13 => [
                'title' => 'Climate Action',
                'overview' => 'Take urgent action to combat climate change and its impacts.',
                'topics' => [
                    'International Climate Summits' => 'Sponsoring WMSU student delegates to attend global environmental conferences like COP.',
                    'Joint Climate Science Studies' => 'Partnering with foreign meteorological and environmental institutes to study regional climate impacts.',
                    'Global Reforestation Initiatives' => 'Connecting local tree-planting efforts with international carbon-offset programs and NGOs.',
                ],
            ],
            14 => [
                'title' => 'Life Below Water',
                'overview' => 'Conserve and sustainably use the oceans, seas and marine resources for sustainable development.',
                'topics' => [
                    'Marine Biology Exchanges' => 'Collaborative research programs with international universities focusing on coral reef preservation and marine biodiversity.',
                    'Global Coastal Conservation' => 'Partnering with international marine NGOs for joint coastal cleanups and conservation training.',
                    'Sustainable Fisheries Research' => 'Cross-border studies aimed at protecting local aquatic resources while supporting the livelihood of coastal communities.',
                ],
            ],
            15 => [
                'title' => 'Life on Land',
                'overview' => 'Protect, restore and promote sustainable use of terrestrial ecosystems, sustainably manage forests, combat desertification, and halt and reverse land degradation and halt biodiversity loss.',
                'topics' => [
                    'International Forestry Research' => 'Joint programs focusing on sustainable agroforestry and combating deforestation in tropical regions.',
                    'Biodiversity Conservation Linkages' => 'Partnering with global wildlife funds to study and protect endemic species in the region.',
                    'Global Ecological Restoration' => 'Sharing knowledge and resources with foreign institutions on rehabilitating degraded lands.',
                ],
            ],
            16 => [
                'title' => 'Peace, Justice and Strong Institutions',
                'overview' => 'Promote peaceful and inclusive societies for sustainable development, provide access to justice for all and build effective, accountable and inclusive institutions at all levels.',
                'topics' => [
                    'International Law & Diplomacy' => 'Exchange programs for WMSU law and political science students to study international human rights and global governance.',
                    'Global Peacebuilding Forums' => 'Hosting cross-cultural dialogues and conflict resolution seminars with international partners, highly relevant to the Mindanao context.',
                    'Anti-Corruption & Transparency Research' => 'Collaborative academic studies on strengthening institutional integrity and public administration.',
                ],
            ],
            17 => [
                'title' => 'Partnerships for the Goals',
                'overview' => 'Strengthen the means of implementation and revitalize the Global Partnership for Sustainable Development.',
                'topics' => [
                    'Bilateral MoUs and Agreements' => 'The core function of the IRO: continuously forging active Memorandums of Understanding with universities worldwide.',
                    'Global University Networks' => 'Active membership in international academic consortia (e.g., ASEAN University Network, UMAP) to amplify WMSU’s global reach.',
                    'International Grant Sourcing' => 'Collaborating with foreign embassies and international funding agencies to support joint capacity-building projects.',
                ],
            ],
        ];

        $index = 1;
        foreach ($sdgs as $sdgData) {
            // 1. Create the SDG
            $sdg = Sdg::create([
                'sdg_number' => $index,
                'title' => $sdgData['title'],
                'overview' => $sdgData['overview'],
                'image_path' => null,
            ]);

            // 2. Loop through the topics and attach them
            foreach ($sdgData['topics'] as $topicTitle => $topicDescription) {
                $sdg->topics()->create([
                    'title' => $topicTitle,
                    'description' => $topicDescription,
                ]);
            }
            $index++; // Increment to 2, 3, etc.
        }
    }
}
