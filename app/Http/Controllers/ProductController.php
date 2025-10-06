<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Test data for products
    private function getAccelerometerData()
    {
        return [
            [
                'id' => 1,
                'name' => 'NSA1001-02',
                'image' => 'nsa1001-02.png',
                'range' => '±2g to ±16g',
                'application' => 'Navigation systems, vibration monitoring'
            ],
            [
                'id' => 2,
                'name' => 'NSA1005-50',
                'image' => 'NSA1005-50.png',
                'range' => '±50g',
                'application' => 'High-g applications, impact detection'
            ],
            [
                'id' => 3,
                'name' => 'NSA1009-1K',
                'image' => 'nsa1009-1k.png',
                'range' => '±1000g',
                'application' => 'Extreme impact detection, crash testing'
            ],
            [
                'id' => 4,
                'name' => 'NSA290',
                'image' => 'NSA290.png',
                'range' => '±290g',
                'application' => 'Aerospace, military applications'
            ],
            [
                'id' => 5,
                'name' => 'NSA4000D',
                'image' => 'NSA4000D.png',
                'range' => '±4000g',
                'application' => 'Ballistics, explosive testing'
            ],
            [
                'id' => 6,
                'name' => 'NSAEM1010',
                'image' => 'NSAEM1010.png',
                'range' => '±10g',
                'application' => 'EMI resistant applications'
            ]
        ];
    }

    private function getGyroscopeData()
    {
        return [
            [
                'name' => 'NSG120',
                'image' => 'NSLG120.PNG',
                'application' => 'Aviation, marine navigation',
                'technology' => 'Fiber optic gyroscope'
            ],
            [
                'name' => 'NSG40',
                'image' => 'NSLG40.png',
                'application' => 'Robotics, autonomous vehicles',
                'technology' => 'Ring laser gyroscope'
            ],
            [
                'name' => 'NSG70',
                'image' => 'NSLG70.png',
                'application' => 'Marine navigation, surveying',
                'technology' => 'Fiber optic gyroscope'
            ],
            [
                'name' => 'NSG90',
                'image' => 'nslg90.png',
                'application' => 'Aerospace, precision navigation',
                'technology' => 'Ring laser gyroscope'
            ],
            [
                'name' => 'NSOG3-30',
                'image' => 'NSOG3-30.png',
                'application' => 'Industrial automation, robotics',
                'technology' => 'Optical gyroscope'
            ],
            [
                'name' => 'NSGFZH',
                'image' => 'NSGFZH.png',
                'application' => 'High-precision applications',
                'technology' => 'Fiber optic gyroscope'
            ]
        ];
    }

    private function getIMUData()
    {
        return [
            [
                'id' => 1,
                'name' => 'NSI312',
                'image' => 'NSI312.png',
                'type' => '6-axis IMU',
                'application' => 'Drones, autonomous vehicles'
            ],
            [
                'id' => 2,
                'name' => 'NSI313',
                'image' => 'NSI313.png',
                'type' => '6-axis IMU',
                'application' => 'Industrial automation, robotics'
            ],
            [
                'id' => 3,
                'name' => 'NSI325',
                'image' => 'NSI325.png',
                'type' => '9-axis IMU',
                'application' => 'Marine navigation, aerospace'
            ],
            [
                'id' => 4,
                'name' => 'NSI6F1',
                'image' => 'NSI6F1.png',
                'type' => '6-axis IMU',
                'application' => 'Precision navigation, surveying'
            ],
            [
                'id' => 5,
                'name' => 'NSI6F1A',
                'image' => 'nsi6f1a.png',
                'type' => '6-axis IMU',
                'application' => 'Enhanced precision applications'
            ],
            [
                'id' => 6,
                'name' => 'NSI9F2',
                'image' => 'NSI9F2.png',
                'type' => '9-axis IMU',
                'application' => 'Advanced navigation systems'
            ]
        ];
    }

    private function getProductDetail($type, $id)
    {
        $products = [];
        
        switch ($type) {
            case 'accelerometer':
                $products = $this->getAccelerometerData();
                break;
            case 'gyroscope':
                $products = $this->getGyroscopeData();
                break;
            case 'imu':
                $products = $this->getIMUData();
                break;
        }

        foreach ($products as $product) {
            if (($type === 'gyroscope' && $product['name'] === $id) || 
                ($type !== 'gyroscope' && $product['id'] == $id)) {
                
                // Get specific details for each product
                $details = $this->getProductSpecificDetails($type, $product['name']);
                
                return array_merge($product, $details);
            }
        }

        return null;
    }

    private function getProductSpecificDetails($type, $name)
    {
        $details = [
            'description' => 'High-precision sensor designed for demanding applications.',
            'specs' => [
                'Accuracy' => '±0.1%',
                'Temperature Range' => '-40°C to +85°C',
                'Power Supply' => '3.3V to 5V',
                'Interface' => 'SPI/I2C',
                'Package' => 'LGA-14'
            ],
            'datasheet' => 'datasheets/' . strtolower($name) . '.pdf'
        ];

        // Specific details for accelerometers
        if ($type === 'accelerometer') {
            switch ($name) {
                case 'NSA1001-02':
                    $details = [
                        'description' => 'High-precision digital accelerometer with selectable measurement ranges. Ideal for navigation systems and vibration monitoring applications.',
                        'specs' => [
                            'Measurement Range' => '±2g, ±4g, ±8g, ±16g',
                            'Resolution' => '16-bit',
                            'Accuracy' => '±0.1%',
                            'Temperature Range' => '-40°C to +85°C',
                            'Power Supply' => '3.3V ±5%',
                            'Interface' => 'SPI/I2C',
                            'Package' => 'LGA-14',
                            'Dimensions' => '3mm × 3mm × 1mm'
                        ],
                        'datasheet' => 'datasheets/nsa1001-02.pdf'
                    ];
                    break;
                case 'NSA1005-50':
                    $details = [
                        'description' => 'High-g accelerometer designed for impact detection and crash testing applications.',
                        'specs' => [
                            'Measurement Range' => '±50g',
                            'Resolution' => '14-bit',
                            'Accuracy' => '±0.2%',
                            'Temperature Range' => '-40°C to +85°C',
                            'Power Supply' => '5V ±10%',
                            'Interface' => 'SPI',
                            'Package' => 'LGA-16',
                            'Dimensions' => '5mm × 5mm × 1.5mm'
                        ],
                        'datasheet' => 'datasheets/nsa1005-50.pdf'
                    ];
                    break;
                case 'NSA1009-1K':
                    $details = [
                        'description' => 'Extreme high-g accelerometer for ballistics and explosive testing applications.',
                        'specs' => [
                            'Measurement Range' => '±1000g',
                            'Resolution' => '12-bit',
                            'Accuracy' => '±0.5%',
                            'Temperature Range' => '-40°C to +85°C',
                            'Power Supply' => '5V ±10%',
                            'Interface' => 'SPI',
                            'Package' => 'LGA-20',
                            'Dimensions' => '8mm × 8mm × 2mm'
                        ],
                        'datasheet' => 'datasheets/nsa1009-1k.pdf'
                    ];
                    break;
                case 'NSA290':
                    $details = [
                        'description' => 'High-g accelerometer designed for aerospace and military applications requiring extreme reliability.',
                        'specs' => [
                            'Measurement Range' => '±290g',
                            'Resolution' => '14-bit',
                            'Accuracy' => '±0.3%',
                            'Temperature Range' => '-55°C to +125°C',
                            'Power Supply' => '5V ±10%',
                            'Interface' => 'SPI',
                            'Package' => 'LGA-18',
                            'Dimensions' => '6mm × 6mm × 1.8mm'
                        ],
                        'datasheet' => 'datasheets/nsa290.pdf'
                    ];
                    break;
                case 'NSA4000D':
                    $details = [
                        'description' => 'Ultra high-g accelerometer for ballistics, explosive testing, and impact analysis applications.',
                        'specs' => [
                            'Measurement Range' => '±4000g',
                            'Resolution' => '10-bit',
                            'Accuracy' => '±1%',
                            'Temperature Range' => '-40°C to +85°C',
                            'Power Supply' => '12V ±10%',
                            'Interface' => 'SPI',
                            'Package' => 'LGA-24',
                            'Dimensions' => '10mm × 10mm × 3mm'
                        ],
                        'datasheet' => 'datasheets/nsa4000d.pdf'
                    ];
                    break;
                case 'NSAEM1010':
                    $details = [
                        'description' => 'EMI-resistant accelerometer designed for applications in electrically noisy environments.',
                        'specs' => [
                            'Measurement Range' => '±10g',
                            'Resolution' => '16-bit',
                            'Accuracy' => '±0.1%',
                            'Temperature Range' => '-40°C to +85°C',
                            'Power Supply' => '3.3V ±5%',
                            'Interface' => 'SPI/I2C',
                            'Package' => 'LGA-16',
                            'Dimensions' => '4mm × 4mm × 1.2mm',
                            'EMI Protection' => 'Shielded housing'
                        ],
                        'datasheet' => 'datasheets/nsaem1010.pdf'
                    ];
                    break;
            }
        }

        // Specific details for gyroscopes
        if ($type === 'gyroscope') {
            switch ($name) {
                case 'NSG120':
                    $details = [
                        'description' => 'High-precision fiber optic gyroscope for aviation and marine navigation applications.',
                        'specs' => [
                            'Measurement Range' => '±120°/s',
                            'Resolution' => '0.01°/s',
                            'Accuracy' => '±0.01°/h',
                            'Temperature Range' => '-40°C to +85°C',
                            'Power Supply' => '12V ±10%',
                            'Interface' => 'RS-485',
                            'Package' => 'Aluminum housing',
                            'Dimensions' => '50mm × 50mm × 30mm'
                        ],
                        'datasheet' => 'datasheets/nsg120.pdf'
                    ];
                    break;
                case 'NSG40':
                    $details = [
                        'description' => 'Ring laser gyroscope for robotics and autonomous vehicle applications.',
                        'specs' => [
                            'Measurement Range' => '±40°/s',
                            'Resolution' => '0.001°/s',
                            'Accuracy' => '±0.1°/h',
                            'Temperature Range' => '-20°C to +70°C',
                            'Power Supply' => '5V ±5%',
                            'Interface' => 'SPI/I2C',
                            'Package' => 'Ceramic package',
                            'Dimensions' => '15mm × 15mm × 5mm'
                        ],
                        'datasheet' => 'datasheets/nsg40.pdf'
                    ];
                    break;
                case 'NSG70':
                    $details = [
                        'description' => 'Fiber optic gyroscope optimized for marine navigation and surveying applications.',
                        'specs' => [
                            'Measurement Range' => '±70°/s',
                            'Resolution' => '0.005°/s',
                            'Accuracy' => '±0.05°/h',
                            'Temperature Range' => '-40°C to +85°C',
                            'Power Supply' => '12V ±10%',
                            'Interface' => 'RS-485',
                            'Package' => 'Marine-grade housing',
                            'Dimensions' => '40mm × 40mm × 25mm'
                        ],
                        'datasheet' => 'datasheets/nsg70.pdf'
                    ];
                    break;
                case 'NSG90':
                    $details = [
                        'description' => 'High-precision ring laser gyroscope for aerospace and precision navigation applications.',
                        'specs' => [
                            'Measurement Range' => '±90°/s',
                            'Resolution' => '0.0005°/s',
                            'Accuracy' => '±0.01°/h',
                            'Temperature Range' => '-40°C to +85°C',
                            'Power Supply' => '12V ±5%',
                            'Interface' => 'RS-422',
                            'Package' => 'Aerospace-grade housing',
                            'Dimensions' => '45mm × 45mm × 30mm'
                        ],
                        'datasheet' => 'datasheets/nsg90.pdf'
                    ];
                    break;
                case 'NSOG3-30':
                    $details = [
                        'description' => 'Optical gyroscope designed for industrial automation and robotics applications.',
                        'specs' => [
                            'Measurement Range' => '±30°/s',
                            'Resolution' => '0.01°/s',
                            'Accuracy' => '±0.5°/h',
                            'Temperature Range' => '-20°C to +70°C',
                            'Power Supply' => '5V ±5%',
                            'Interface' => 'SPI/I2C',
                            'Package' => 'Industrial housing',
                            'Dimensions' => '20mm × 20mm × 8mm'
                        ],
                        'datasheet' => 'datasheets/nsog3-30.pdf'
                    ];
                    break;
                case 'NSGFZH':
                    $details = [
                        'description' => 'High-precision fiber optic gyroscope for demanding applications requiring maximum accuracy.',
                        'specs' => [
                            'Measurement Range' => '±100°/s',
                            'Resolution' => '0.001°/s',
                            'Accuracy' => '±0.005°/h',
                            'Temperature Range' => '-40°C to +85°C',
                            'Power Supply' => '12V ±5%',
                            'Interface' => 'RS-485',
                            'Package' => 'Precision housing',
                            'Dimensions' => '50mm × 50mm × 35mm'
                        ],
                        'datasheet' => 'datasheets/nsgfzh.pdf'
                    ];
                    break;
            }
        }

        // Specific details for IMUs
        if ($type === 'imu') {
            switch ($name) {
                case 'NSI312':
                    $details = [
                        'description' => '6-axis IMU combining 3-axis accelerometer and 3-axis gyroscope for drone and autonomous vehicle applications.',
                        'specs' => [
                            'Accelerometer Range' => '±16g',
                            'Gyroscope Range' => '±2000°/s',
                            'Resolution' => '16-bit',
                            'Accuracy' => '±0.1%',
                            'Temperature Range' => '-40°C to +85°C',
                            'Power Supply' => '3.3V ±5%',
                            'Interface' => 'SPI/I2C',
                            'Package' => 'LGA-24',
                            'Dimensions' => '4mm × 4mm × 1.2mm'
                        ],
                        'datasheet' => 'datasheets/nsi312.pdf'
                    ];
                    break;
                case 'NSI325':
                    $details = [
                        'description' => '9-axis IMU with accelerometer, gyroscope, and magnetometer for marine navigation and aerospace applications.',
                        'specs' => [
                            'Accelerometer Range' => '±16g',
                            'Gyroscope Range' => '±2000°/s',
                            'Magnetometer Range' => '±4900μT',
                            'Resolution' => '16-bit',
                            'Accuracy' => '±0.05%',
                            'Temperature Range' => '-40°C to +85°C',
                            'Power Supply' => '3.3V ±5%',
                            'Interface' => 'SPI/I2C',
                            'Package' => 'LGA-28',
                            'Dimensions' => '5mm × 5mm × 1.5mm'
                        ],
                        'datasheet' => 'datasheets/nsi325.pdf'
                    ];
                    break;
                case 'NSI313':
                    $details = [
                        'description' => '6-axis IMU optimized for industrial automation and robotics applications with enhanced reliability.',
                        'specs' => [
                            'Accelerometer Range' => '±8g',
                            'Gyroscope Range' => '±1000°/s',
                            'Resolution' => '16-bit',
                            'Accuracy' => '±0.1%',
                            'Temperature Range' => '-40°C to +85°C',
                            'Power Supply' => '3.3V ±5%',
                            'Interface' => 'SPI/I2C',
                            'Package' => 'LGA-20',
                            'Dimensions' => '4mm × 4mm × 1mm'
                        ],
                        'datasheet' => 'datasheets/nsi313.pdf'
                    ];
                    break;
                case 'NSI6F1':
                    $details = [
                        'description' => 'High-precision 6-axis IMU for precision navigation and surveying applications.',
                        'specs' => [
                            'Accelerometer Range' => '±16g',
                            'Gyroscope Range' => '±2000°/s',
                            'Resolution' => '18-bit',
                            'Accuracy' => '±0.02%',
                            'Temperature Range' => '-40°C to +85°C',
                            'Power Supply' => '3.3V ±5%',
                            'Interface' => 'SPI/I2C',
                            'Package' => 'LGA-24',
                            'Dimensions' => '4mm × 4mm × 1.2mm'
                        ],
                        'datasheet' => 'datasheets/nsi6f1.pdf'
                    ];
                    break;
                case 'NSI6F1A':
                    $details = [
                        'description' => 'Enhanced version of NSI6F1 with improved accuracy and extended temperature range.',
                        'specs' => [
                            'Accelerometer Range' => '±16g',
                            'Gyroscope Range' => '±2000°/s',
                            'Resolution' => '18-bit',
                            'Accuracy' => '±0.01%',
                            'Temperature Range' => '-55°C to +125°C',
                            'Power Supply' => '3.3V ±5%',
                            'Interface' => 'SPI/I2C',
                            'Package' => 'LGA-24',
                            'Dimensions' => '4mm × 4mm × 1.2mm'
                        ],
                        'datasheet' => 'datasheets/nsi6f1a.pdf'
                    ];
                    break;
                case 'NSI9F2':
                    $details = [
                        'description' => 'Advanced 9-axis IMU with enhanced sensor fusion algorithms for demanding navigation applications.',
                        'specs' => [
                            'Accelerometer Range' => '±16g',
                            'Gyroscope Range' => '±2000°/s',
                            'Magnetometer Range' => '±4900μT',
                            'Resolution' => '18-bit',
                            'Accuracy' => '±0.01%',
                            'Temperature Range' => '-40°C to +85°C',
                            'Power Supply' => '3.3V ±5%',
                            'Interface' => 'SPI/I2C',
                            'Package' => 'LGA-32',
                            'Dimensions' => '6mm × 6mm × 1.8mm'
                        ],
                        'datasheet' => 'datasheets/nsi9f2.pdf'
                    ];
                    break;
            }
        }

        return $details;
    }

    public function accelerometer()
    {
        return view('ACCEL.accelerometer', [
            'accelerometer' => \App\Data\AccelData::getAccelList()
        ]);
    }

    public function gyroscope()
    {
        return view('GYROS.gyroscope', [
            'gyroscope' => \App\Data\GyroData::getGyroscopes()
        ]);
    }

    public function imu()
    {
        return view('IMU.imu', [
            'imus' => \App\Data\ImuData::getImuList()
        ]);
    }

    public function accelerometerProduct($id)
    {
        $sensor = \App\Data\AccelData::getAccelById($id);
        
        if (!$sensor) {
            abort(404);
        }

        return view('ACCEL.accelproduct', [
            'sensor' => $sensor
        ]);
    }

    public function gyroscopeProduct($name)
    {
        $sensor = \App\Data\GyroData::getGyroById($name);
        
        if (!$sensor) {
            abort(404);
        }

        return view('GYROS.gyroproduct', [
            'sensor' => $sensor
        ]);
    }

    public function imuProduct($id)
    {
        $sensor = \App\Data\ImuData::getImuById($id);
        
        if (!$sensor) {
            abort(404);
        }

        return view('IMU.IMUproduct', [
            'sensor' => $sensor
        ]);
    }
}