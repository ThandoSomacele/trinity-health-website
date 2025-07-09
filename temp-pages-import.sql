-- Trinity Health Pages Import Script
-- Run this after starting DDEV with: ddev wp db query < temp-pages-import.sql

-- About Us Page
INSERT INTO wp_posts (post_title, post_name, post_content, post_status, post_type, post_date, post_date_gmt, post_modified, post_modified_gmt, post_excerpt, comment_status, ping_status, to_ping, pinged, post_content_filtered, post_parent, menu_order, post_mime_type, guid, comment_count) VALUES
('About Us', 'about', '<h1>About Trinity Health Zambia</h1>
<p>At Trinity Health Zambia, we are dedicated to providing comprehensive healthcare services with a focus on excellence, compassion, and patient-centered care. Our practice combines general health services with specialized audiology care to serve our community\'s diverse healthcare needs.</p>

<h2>Our Mission</h2>
<p>To deliver exceptional healthcare services that enhance the quality of life for our patients and the broader Zambian community through innovative treatment approaches, personalized care, and unwavering commitment to health excellence.</p>

<h2>Our Values</h2>
<ul>
<li><strong>Excellence:</strong> We strive for the highest standards in medical care and patient service</li>
<li><strong>Compassion:</strong> We treat every patient with dignity, respect, and understanding</li>
<li><strong>Innovation:</strong> We embrace modern healthcare technologies and evidence-based practices</li>
<li><strong>Accessibility:</strong> We make quality healthcare accessible to all members of our community</li>
<li><strong>Integrity:</strong> We maintain the highest ethical standards in all our practices</li>
</ul>

<h2>Our Practice</h2>
<p>Trinity Health Zambia was founded with the vision of creating a healthcare environment that combines the warmth of personalized care with the precision of modern medicine. Our team of qualified healthcare professionals is committed to providing comprehensive services ranging from routine check-ups to specialized audiology treatments.</p>

<h2>Why Choose Trinity Health?</h2>
<ul>
<li>Comprehensive general health services</li>
<li>Specialized audiology and hearing care</li>
<li>Modern, comfortable facilities</li>
<li>Experienced and caring medical professionals</li>
<li>Patient-centered approach to healthcare</li>
<li>Convenient location with flexible scheduling</li>
</ul>

<p>Contact us today to schedule an appointment and experience the Trinity Health difference.</p>', 'publish', 'page', NOW(), UTC_TIMESTAMP(), NOW(), UTC_TIMESTAMP(), '', 'closed', 'closed', '', '', '', 0, 0, '', '', 0),

-- Our Services Page
('Our Services', 'services', '<h1>Our Services</h1>
<p>Trinity Health Zambia offers comprehensive healthcare services designed to meet the diverse needs of our community. From routine preventive care to specialized treatments, we are committed to providing exceptional medical care with a patient-centered approach.</p>

<h2>General Health Services</h2>
<p>Our general health services encompass a wide range of medical care options designed to keep you healthy and address any health concerns that may arise.</p>

<h3>Primary Care</h3>
<ul>
<li>Routine check-ups and physical examinations</li>
<li>Acute illness treatment</li>
<li>Chronic condition management</li>
<li>Health consultations</li>
<li>Referrals to specialists</li>
</ul>

<h3>Preventive Care</h3>
<ul>
<li>Vaccination programs</li>
<li>Health screenings</li>
<li>Health education and counseling</li>
<li>Lifestyle modification guidance</li>
<li>Wellness programs</li>
</ul>

<h2>Audiology Services</h2>
<p>Our specialized audiology department provides comprehensive hearing healthcare services using the latest technology and evidence-based practices.</p>

<h3>Hearing Assessment</h3>
<ul>
<li>Comprehensive hearing evaluations</li>
<li>Audiometric testing</li>
<li>Tympanometry</li>
<li>Hearing aid assessments</li>
<li>Pediatric hearing tests</li>
</ul>

<h3>Hearing Solutions</h3>
<ul>
<li>Hearing aid fittings and adjustments</li>
<li>Tinnitus treatment</li>
<li>Hearing rehabilitation programs</li>
<li>Follow-up care and support</li>
<li>Hearing protection services</li>
</ul>

<h2>Emergency Care</h2>
<p>We provide urgent care services for non-life-threatening medical conditions that require immediate attention.</p>

<h2>Schedule Your Appointment</h2>
<p>Ready to take charge of your health? Contact Trinity Health Zambia today to schedule an appointment. Our friendly staff will help you find the right service and time that works for you.</p>

<p><strong>Phone:</strong> [Phone Number]<br>
<strong>Email:</strong> [Email Address]<br>
<strong>Address:</strong> [Practice Address]</p>', 'publish', 'page', NOW(), UTC_TIMESTAMP(), NOW(), UTC_TIMESTAMP(), '', 'closed', 'closed', '', '', '', 0, 0, '', '', 0),

-- Patient Care Page
('Patient Care', 'patient-care', '<h1>Patient Care</h1>
<p>At Trinity Health Zambia, patient care is at the heart of everything we do. We believe that exceptional healthcare goes beyond medical treatment – it encompasses the entire patient experience from the moment you contact us until your complete recovery and ongoing health maintenance.</p>

<h2>Our Patient-Centered Approach</h2>
<p>We understand that each patient is unique, with individual needs, concerns, and goals. Our healthcare team takes the time to listen, understand, and develop personalized treatment plans that align with your specific requirements and lifestyle.</p>

<h2>What to Expect During Your Visit</h2>

<h3>Before Your Appointment</h3>
<ul>
<li>Convenient scheduling options</li>
<li>Appointment reminders</li>
<li>Pre-visit preparation guidance</li>
<li>Insurance verification assistance</li>
<li>New patient forms and information</li>
</ul>

<h3>During Your Visit</h3>
<ul>
<li>Comfortable, modern waiting areas</li>
<li>Prompt, professional service</li>
<li>Thorough consultations and examinations</li>
<li>Clear explanations of diagnoses and treatments</li>
<li>Opportunity to ask questions and discuss concerns</li>
</ul>

<h3>After Your Visit</h3>
<ul>
<li>Follow-up care coordination</li>
<li>Test results communication</li>
<li>Prescription management</li>
<li>Referral assistance when needed</li>
<li>Ongoing support and guidance</li>
</ul>

<h2>Patient Rights and Responsibilities</h2>

<h3>Your Rights</h3>
<ul>
<li>Quality healthcare regardless of background</li>
<li>Respect for your dignity and privacy</li>
<li>Clear information about your condition and treatment</li>
<li>Participation in healthcare decisions</li>
<li>Access to your medical records</li>
</ul>

<h3>Your Responsibilities</h3>
<ul>
<li>Provide accurate health information</li>
<li>Follow agreed-upon treatment plans</li>
<li>Keep scheduled appointments</li>
<li>Communicate concerns openly</li>
<li>Respect staff and other patients</li>
</ul>

<h2>Contact Patient Services</h2>
<p>For questions about patient care, appointments, or any other concerns, please contact our patient services team:</p>

<p><strong>Phone:</strong> [Phone Number]<br>
<strong>Email:</strong> [Email Address]<br>
<strong>Office Hours:</strong> [Office Hours]</p>', 'publish', 'page', NOW(), UTC_TIMESTAMP(), NOW(), UTC_TIMESTAMP(), '', 'closed', 'closed', '', '', '', 0, 0, '', '', 0);