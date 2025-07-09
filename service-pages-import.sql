-- Trinity Health Service Pages Import Script
-- Run this after starting DDEV with: ddev wp db query < service-pages-import.sql

-- Primary Care Page
INSERT INTO wp_posts (post_title, post_name, post_content, post_status, post_type, post_date, post_date_gmt, post_modified, post_modified_gmt, post_excerpt, comment_status, ping_status, to_ping, pinged, post_content_filtered, post_parent, menu_order, post_mime_type, guid, comment_count) VALUES
('Primary Care', 'primary-care', '<h1>Primary Care Services</h1>
<p>Primary care is the foundation of good health. At Trinity Health Zambia, our primary care services focus on comprehensive, continuous, and preventive healthcare for individuals and families of all ages.</p>

<h2>Our Primary Care Services</h2>

<h3>Routine Health Care</h3>
<ul>
<li>Annual physical examinations</li>
<li>Preventive health screenings</li>
<li>Vaccination and immunization programs</li>
<li>Health risk assessments</li>
<li>Wellness consultations</li>
</ul>

<h3>Acute Care</h3>
<ul>
<li>Treatment of common illnesses (cold, flu, infections)</li>
<li>Minor injury care</li>
<li>Urgent medical consultations</li>
<li>Same-day sick visits</li>
<li>Prescription medication management</li>
</ul>

<h3>Chronic Disease Management</h3>
<ul>
<li>Diabetes care and monitoring</li>
<li>Hypertension management</li>
<li>Heart disease prevention and care</li>
<li>Asthma and respiratory conditions</li>
<li>Arthritis and joint pain management</li>
</ul>

<h2>Why Choose Trinity Health for Primary Care?</h2>
<ul>
<li><strong>Comprehensive Care:</strong> We address all aspects of your health and wellness</li>
<li><strong>Personalized Approach:</strong> Treatment plans tailored to your individual needs</li>
<li><strong>Preventive Focus:</strong> Emphasis on preventing illness before it occurs</li>
<li><strong>Continuity:</strong> Long-term relationships with your healthcare team</li>
<li><strong>Coordination:</strong> Seamless referrals to specialists when needed</li>
</ul>

<h2>What to Expect</h2>
<p>During your primary care visit, Dr. Mwamba and our team will:</p>
<ul>
<li>Review your medical history and current symptoms</li>
<li>Perform a thorough physical examination</li>
<li>Discuss your lifestyle, diet, and exercise habits</li>
<li>Provide health education and counseling</li>
<li>Develop a personalized treatment plan</li>
<li>Schedule follow-up appointments as needed</li>
</ul>

<h2>Schedule Your Primary Care Appointment</h2>
<p>Take the first step toward optimal health. Contact Trinity Health Zambia today to schedule your primary care appointment.</p>

<p><strong>Phone:</strong> [Phone Number]<br>
<strong>Email:</strong> appointments@trinityhealthzambia.com</p>', 'publish', 'page', NOW(), UTC_TIMESTAMP(), NOW(), UTC_TIMESTAMP(), '', 'closed', 'closed', '', '', '', 0, 0, '', '', 0),

-- Preventive Care Page
('Preventive Care', 'preventive-care', '<h1>Preventive Care Services</h1>
<p>Prevention is always better than treatment. Trinity Health Zambia\'s preventive care services are designed to help you maintain optimal health, detect potential health issues early, and prevent disease before it develops.</p>

<h2>Preventive Care Services</h2>

<h3>Health Screenings</h3>
<ul>
<li>Blood pressure monitoring</li>
<li>Cholesterol testing</li>
<li>Diabetes screening</li>
<li>Cancer screenings (cervical, breast, prostate)</li>
<li>Cardiovascular risk assessments</li>
<li>Bone density testing</li>
</ul>

<h3>Vaccination Programs</h3>
<ul>
<li>Routine childhood immunizations</li>
<li>Adult vaccination schedules</li>
<li>Travel vaccines</li>
<li>Seasonal flu shots</li>
<li>COVID-19 vaccinations</li>
<li>Hepatitis prevention</li>
</ul>

<h3>Wellness Programs</h3>
<ul>
<li>Nutrition counseling</li>
<li>Weight management programs</li>
<li>Exercise and fitness guidance</li>
<li>Stress management techniques</li>
<li>Smoking cessation support</li>
<li>Substance abuse prevention</li>
</ul>

<h2>Age-Specific Preventive Care</h2>

<h3>Children and Adolescents</h3>
<ul>
<li>Well-child visits</li>
<li>Growth and development monitoring</li>
<li>School and sports physicals</li>
<li>Immunization schedules</li>
<li>Nutritional guidance</li>
</ul>

<h3>Adults</h3>
<ul>
<li>Annual health assessments</li>
<li>Chronic disease prevention</li>
<li>Health risk evaluations</li>
<li>Lifestyle counseling</li>
<li>Reproductive health services</li>
</ul>

<h3>Seniors</h3>
<ul>
<li>Geriatric health assessments</li>
<li>Fall prevention programs</li>
<li>Medication management</li>
<li>Cognitive health screenings</li>
<li>Chronic condition monitoring</li>
</ul>

<h2>Benefits of Preventive Care</h2>
<ul>
<li><strong>Early Detection:</strong> Identify health issues before symptoms appear</li>
<li><strong>Cost-Effective:</strong> Prevent expensive treatments through early intervention</li>
<li><strong>Better Outcomes:</strong> Improved health and quality of life</li>
<li><strong>Peace of Mind:</strong> Confidence in your health status</li>
<li><strong>Personalized Plans:</strong> Tailored prevention strategies</li>
</ul>

<h2>Schedule Your Preventive Care Visit</h2>
<p>Invest in your future health today. Contact Trinity Health Zambia to schedule your preventive care appointment.</p>

<p><strong>Phone:</strong> [Phone Number]<br>
<strong>Email:</strong> appointments@trinityhealthzambia.com</p>', 'publish', 'page', NOW(), UTC_TIMESTAMP(), NOW(), UTC_TIMESTAMP(), '', 'closed', 'closed', '', '', '', 0, 0, '', '', 0),

-- Hearing Tests Page
('Hearing Tests', 'hearing-tests', '<h1>Comprehensive Hearing Tests</h1>
<p>At Trinity Health Zambia, we provide comprehensive hearing assessments using state-of-the-art equipment and evidence-based testing procedures. Our hearing tests are designed to accurately evaluate your hearing ability and identify any potential hearing issues.</p>

<h2>Types of Hearing Tests</h2>

<h3>Audiometry Testing</h3>
<ul>
<li>Pure tone audiometry</li>
<li>Speech audiometry</li>
<li>Bone conduction testing</li>
<li>Air conduction testing</li>
<li>Hearing threshold assessments</li>
</ul>

<h3>Specialized Tests</h3>
<ul>
<li>Tympanometry (middle ear function)</li>
<li>Acoustic reflex testing</li>
<li>Otoacoustic emissions (OAE)</li>
<li>Auditory brainstem response (ABR)</li>
<li>Central auditory processing evaluations</li>
</ul>

<h3>Pediatric Hearing Tests</h3>
<ul>
<li>Newborn hearing screenings</li>
<li>Pediatric audiometry</li>
<li>Play audiometry for young children</li>
<li>Developmental hearing assessments</li>
<li>School hearing screenings</li>
</ul>

<h2>What to Expect During Your Hearing Test</h2>

<h3>Before Your Test</h3>
<ul>
<li>Medical history review</li>
<li>Hearing concerns discussion</li>
<li>Ear examination</li>
<li>Test procedure explanation</li>
</ul>

<h3>During Your Test</h3>
<ul>
<li>Comfortable testing environment</li>
<li>Various hearing tests as needed</li>
<li>Clear instructions throughout</li>
<li>Professional, caring staff</li>
</ul>

<h3>After Your Test</h3>
<ul>
<li>Immediate results discussion</li>
<li>Audiogram explanation</li>
<li>Treatment recommendations</li>
<li>Follow-up care planning</li>
</ul>

<h2>Signs You May Need a Hearing Test</h2>
<ul>
<li>Difficulty hearing conversations</li>
<li>Asking people to repeat themselves</li>
<li>Turning up TV or radio volume</li>
<li>Ringing in ears (tinnitus)</li>
<li>Difficulty hearing in noisy environments</li>
<li>Feeling like others are mumbling</li>
<li>Ear pain or discharge</li>
</ul>

<h2>Benefits of Regular Hearing Tests</h2>
<ul>
<li><strong>Early Detection:</strong> Identify hearing loss before it worsens</li>
<li><strong>Better Communication:</strong> Improved relationships and social interactions</li>
<li><strong>Safety:</strong> Ability to hear important sounds and warnings</li>
<li><strong>Quality of Life:</strong> Enhanced overall well-being</li>
<li><strong>Treatment Options:</strong> Access to appropriate hearing solutions</li>
</ul>

<h2>Schedule Your Hearing Test</h2>
<p>Don\'t let hearing loss go undetected. Contact Trinity Health Zambia today to schedule your comprehensive hearing test.</p>

<p><strong>Phone:</strong> [Phone Number]<br>
<strong>Email:</strong> appointments@trinityhealthzambia.com</p>', 'publish', 'page', NOW(), UTC_TIMESTAMP(), NOW(), UTC_TIMESTAMP(), '', 'closed', 'closed', '', '', '', 0, 0, '', '', 0),

-- Emergency Care Page
('Emergency Care', 'emergency-care', '<h1>Emergency Care Services</h1>
<p>When urgent medical care is needed, Trinity Health Zambia is here to help. Our emergency care services provide immediate attention for non-life-threatening medical conditions that require prompt treatment.</p>

<h2>Emergency Services Available</h2>

<h3>Urgent Medical Conditions</h3>
<ul>
<li>Severe infections</li>
<li>High fever</li>
<li>Severe pain</li>
<li>Breathing difficulties</li>
<li>Allergic reactions</li>
<li>Severe nausea and vomiting</li>
</ul>

<h3>Minor Injuries</h3>
<ul>
<li>Cuts and lacerations</li>
<li>Sprains and strains</li>
<li>Minor burns</li>
<li>Animal bites</li>
<li>Foreign object removal</li>
<li>Wound care</li>
</ul>

<h3>Diagnostic Services</h3>
<ul>
<li>Rapid laboratory tests</li>
<li>Basic imaging services</li>
<li>Electrocardiograms (ECG)</li>
<li>Vital sign monitoring</li>
<li>Blood glucose testing</li>
</ul>

<h2>When to Seek Emergency Care</h2>

<h3>Come to Trinity Health for:</h3>
<ul>
<li>Severe but non-life-threatening conditions</li>
<li>Injuries requiring immediate attention</li>
<li>Sudden illness with concerning symptoms</li>
<li>Conditions needing urgent evaluation</li>
<li>When your regular doctor is unavailable</li>
</ul>

<h3>Call 911 or Go to Hospital for:</h3>
<ul>
<li>Chest pain or heart attack symptoms</li>
<li>Severe difficulty breathing</li>
<li>Severe bleeding</li>
<li>Head injuries with loss of consciousness</li>
<li>Severe allergic reactions</li>
<li>Suspected stroke</li>
</ul>

<h2>What to Expect</h2>

<h3>Immediate Assessment</h3>
<ul>
<li>Rapid triage evaluation</li>
<li>Symptom assessment</li>
<li>Vital sign monitoring</li>
<li>Pain management</li>
<li>Priority-based care</li>
</ul>

<h3>Treatment Process</h3>
<ul>
<li>Thorough examination</li>
<li>Diagnostic testing if needed</li>
<li>Appropriate treatment</li>
<li>Pain relief measures</li>
<li>Follow-up care instructions</li>
</ul>

<h2>Emergency Contact Information</h2>
<p><strong>Emergency Line:</strong> [Emergency Phone Number]<br>
<strong>Main Office:</strong> [Main Phone Number]<br>
<strong>Address:</strong> [Practice Address]</p>

<h2>Emergency Hours</h2>
<p><strong>Extended Hours:</strong> [Extended Hours]<br>
<strong>After Hours:</strong> Call our emergency line<br>
<strong>24/7 Support:</strong> Available for urgent consultations</p>

<h2>What to Bring</h2>
<ul>
<li>Valid identification</li>
<li>Insurance information</li>
<li>List of current medications</li>
<li>Medical history summary</li>
<li>Emergency contact information</li>
</ul>

<h2>Preparation Tips</h2>
<ul>
<li>Stay calm and provide clear information</li>
<li>Bring someone with you if possible</li>
<li>Have your symptoms and timeline ready</li>
<li>Follow pre-arrival instructions</li>
<li>Call ahead when possible</li>
</ul>

<p><strong>Remember:</strong> For life-threatening emergencies, always call 911 or go directly to the nearest emergency room.</p>', 'publish', 'page', NOW(), UTC_TIMESTAMP(), NOW(), UTC_TIMESTAMP(), '', 'closed', 'closed', '', '', '', 0, 0, '', '', 0);