<?php

namespace App\Data;

class NewsData
{
    public static function getNews()
    {
        return [
            [
                'id' => 1,
                'title' => 'New High-Precision IMU Released',
                'summary' => 'We are excited to announce the launch of our latest inertial measurement unit with enhanced accuracy.',
                'content' => '<p>Our new IMU features improved sensor fusion algorithms and extended temperature range operation from -40°C to +85°C.</p><p>The device is now available for commercial and industrial applications.</p><p>Key improvements include reduced power consumption and enhanced vibration resistance.</p>',
                'image' => 'IMU.png',
                'category' => 'Product Launch',
                'date' => '2025-01-15'
            ],
            [
                'id' => 2,
                'title' => 'Partnership with Aerospace Company',
                'summary' => 'Navigation Systems partners with leading aerospace manufacturer for next-generation navigation solutions.',
                'content' => '<p>This strategic partnership will enable the development of advanced navigation systems for commercial aviation.</p><p>Expected delivery of first prototypes is scheduled for Q2 2025.</p><p>The collaboration will focus on developing radiation-hardened sensors for space applications.</p>',
                'image' => 'mission.png',
                'category' => 'Partnership',
                'date' => '2025-01-10'
            ],
            [
                'id' => 3,
                'title' => 'Industry Recognition Award',
                'summary' => 'Our gyroscope technology receives prestigious industry recognition for innovation and reliability.',
                'content' => '<p>The award recognizes our commitment to developing cutting-edge navigation technology.</p><p>This achievement reflects our team\'s dedication to excellence in sensor design.</p><p>The award ceremony will take place at the International Navigation Conference in March 2025.</p>',
                'image' => 'gyroscope.png',
                'category' => 'Awards',
                'date' => '2025-01-05'
            ],
            [
                'id' => 4,
                'title' => 'New Manufacturing Facility Opens',
                'summary' => 'Navigation Systems opens state-of-the-art manufacturing facility to meet growing demand.',
                'content' => '<p>The new 50,000 square foot facility will increase our production capacity by 300%.</p><p>Advanced automation and quality control systems ensure consistent product quality.</p><p>The facility is expected to create 200 new jobs in the local community.</p>',
                'image' => 'factory1.PNG',
                'category' => 'Company News',
                'date' => '2024-12-28'
            ],
            [
                'id' => 5,
                'title' => 'Breakthrough in Sensor Accuracy',
                'summary' => 'Our research team achieves breakthrough in accelerometer accuracy, setting new industry standards.',
                'content' => '<p>The new technology reduces measurement error by 50% compared to previous generations.</p><p>This breakthrough will enable more precise navigation in challenging environments.</p><p>Patent applications have been filed for the innovative sensor design.</p>',
                'image' => 'accel.png',
                'category' => 'Technology',
                'date' => '2024-12-20'
            ],
            [
                'id' => 6,
                'title' => 'Marine Navigation System Success',
                'summary' => 'Our marine navigation system successfully completes 1000-hour endurance test.',
                'content' => '<p>The system maintained accuracy within 0.1% throughout the entire test period.</p><p>Testing was conducted in extreme marine conditions including high humidity and salt spray.</p><p>This success validates our technology for commercial marine applications.</p>',
                'image' => 'map.png',
                'category' => 'Testing',
                'date' => '2024-12-15'
            ],
            [
                'id' => 7,
                'title' => 'AI Integration in Navigation Systems',
                'summary' => 'Navigation Systems announces integration of AI algorithms in next-generation sensors.',
                'content' => '<p>AI-powered sensor fusion will improve accuracy and reduce power consumption.</p><p>The technology will be available in select products starting Q3 2025.</p><p>Machine learning algorithms adapt to environmental conditions in real-time.</p>',
                'image' => 'aidrive.png',
                'category' => 'Technology',
                'date' => '2024-12-10'
            ],
            [
                'id' => 8,
                'title' => 'Space Mission Collaboration',
                'summary' => 'Navigation Systems selected to provide sensors for upcoming Mars mission.',
                'content' => '<p>Our radiation-hardened sensors will be used in the Mars rover navigation system.</p><p>The mission is scheduled for launch in 2026.</p><p>This represents our first involvement in interplanetary exploration.</p>',
                'image' => 'gps.png',
                'category' => 'Space',
                'date' => '2024-12-05'
            ],
            [
                'id' => 9,
                'title' => 'Quality Certification Achieved',
                'summary' => 'Navigation Systems receives ISO 9001:2015 quality management certification.',
                'content' => '<p>The certification demonstrates our commitment to maintaining the highest quality standards.</p><p>All manufacturing processes have been audited and approved by international standards.</p><p>This certification will help us expand into new international markets.</p>',
                'image' => 'factory3.PNG',
                'category' => 'Certification',
                'date' => '2024-11-30'
            ],
            [
                'id' => 10,
                'title' => 'New Research Laboratory',
                'summary' => 'Navigation Systems opens advanced research laboratory for sensor development.',
                'content' => '<p>The new lab features state-of-the-art testing equipment and clean room facilities.</p><p>Research focus will be on next-generation MEMS sensors and quantum navigation.</p><p>The facility will employ 50 research scientists and engineers.</p>',
                'image' => 'factory2.PNG',
                'category' => 'Research',
                'date' => '2024-11-25'
            ]
        ];
    }

    public static function getNewsById($id)
    {
        $news = self::getNews();
        
        foreach ($news as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        
        return null;
    }
}