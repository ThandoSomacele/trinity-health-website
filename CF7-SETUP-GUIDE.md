# Contact Form 7 Setup Guide - Trinity Health Website

## Overview
This guide explains how Contact Form 7 has been configured for your Trinity Health website and how to manage the forms going forward.

## ✅ What Was Done

### 1. Forms Created
Two Contact Form 7 forms have been created:

#### **Form 1: Trinity Health Contact Form (ID: 303)**
- **Location**: Home page & Contact page
- **Purpose**: General contact inquiries
- **Fields**:
  - Your Name (required)
  - Your Email (required)
  - Subject (required)
  - Your Message (optional)
- **Shortcode**: `[contact-form-7 id="303" title="Trinity Health Contact Form"]`

#### **Form 2: Trinity Health Newsletter (ID: 304)**
- **Location**: Footer (appears on all pages)
- **Purpose**: Newsletter subscriptions
- **Fields**:
  - Email Address (required)
- **Shortcode**: `[contact-form-7 id="304" title="Trinity Health Newsletter"]`

### 2. Template Updates
The following theme files were updated to include CF7 forms:

1. **`front-page.php`** (line 542)
   - Replaced static HTML form with CF7 shortcode
   - Added custom styling for maroon background

2. **`page-contact.php`** (line 112)
   - Updated to use new CF7 form ID (303)
   - Maintained existing styling

3. **`footer.php`** (line 103)
   - Replaced static newsletter form with CF7 shortcode
   - Added custom styling to match footer design

### 3. Email Configuration
- **Recipient**: info@trinityhealth.co.zm
- **Sender**: noreply@trinityhealth.co.zm
- **Auto-Reply**: Enabled for both forms
- **Plugin**: WP Mail SMTP (already active)

---

## 📧 How Contact Form 7 Works

### Form Submission Flow
1. **User fills out form** → Fields are validated
2. **User clicks Submit** → AJAX submission (no page reload)
3. **Form data sent** → WordPress processes via Contact Form 7
4. **Email sent** → Two emails are triggered:
   - **Admin notification** → Sent to `info@trinityhealth.co.zm`
   - **Auto-reply** → Sent to the user confirming receipt

### Email Templates

#### Admin Notification Email
```
Subject: Trinity Health - New Contact Form Submission: "[Subject]"

You have received a new message from your website contact form.

Name: [User's Name]
Email: [User's Email]
Subject: [Subject]

Message:
[User's Message]

---
This message was sent from the contact form on https://trinityhealth.co.zm
```

#### User Auto-Reply Email
```
Subject: Trinity Health - Thank you for contacting us

Dear [User's Name],

Thank you for contacting Trinity Health Zambia. We have received your message and will respond as soon as possible.

Your message:
[User's Message]

---
Best regards,
Trinity Health Team
https://trinityhealth.co.zm
```

---

## 🛠️ Managing Forms in WordPress Dashboard

### Accessing Contact Form 7

1. **Login to WordPress Admin**
   - URL: `https://your-domain.com/wp-admin`
   - Navigate to **Contact** → **Contact Forms**

2. **Edit Forms**
   - Click on the form name (e.g., "Trinity Health Contact Form")
   - You'll see several tabs:
     - **Form**: Edit form fields and layout
     - **Mail**: Configure email recipient and template
     - **Messages**: Customize success/error messages
     - **Additional Settings**: Advanced configurations

### Common Edits

#### Change Email Recipient
1. Go to **Contact** → **Contact Forms**
2. Click on the form name
3. Click the **Mail** tab
4. Update the **To** field with new email address
5. Click **Save**

#### Edit Form Fields
1. Go to **Contact** → **Contact Forms**
2. Click on the form name
3. Click the **Form** tab
4. Edit the form markup (be careful with syntax!)
5. Click **Save**

**Example Field Syntax:**
```
[text* your-name placeholder "Your Name" class:w-full]
- text* = text field (required)
- your-name = field name
- placeholder "Your Name" = placeholder text
- class:w-full = CSS class
```

#### Customize Success Messages
1. Go to **Contact** → **Contact Forms**
2. Click on the form name
3. Click the **Messages** tab
4. Edit messages like:
   - "Your message was sent successfully"
   - "There was an error trying to send your message"
5. Click **Save**

---

## 🧪 Testing the Forms

### Local Testing (DDEV)
Your local environment is configured, but emails won't actually send externally. You can:

1. **Check Form Submission**:
   - Visit your site: `ddev launch`
   - Navigate to the home page or contact page
   - Fill out and submit the form
   - You should see a success message

2. **View Email Logs** (WP Mail SMTP):
   - Go to **WP Mail SMTP** → **Email Log**
   - Check if emails were logged (they won't send externally from local)

### Production Testing

After deploying to production:

1. **Test Contact Form**:
   - Visit: https://trinityhealth.co.zm/contact
   - Fill in all fields with test data
   - Submit the form
   - Check for success message
   - Check inbox at `info@trinityhealth.co.zm`

2. **Test Newsletter Form**:
   - Visit any page (footer appears everywhere)
   - Scroll to footer
   - Enter test email address
   - Submit
   - Check inbox at `info@trinityhealth.co.zm`
   - Check the test email inbox for auto-reply

3. **Test Auto-Replies**:
   - Use your personal email when testing
   - You should receive an auto-reply confirmation

---

## ⚙️ WP Mail SMTP Configuration

**IMPORTANT**: For emails to work in production, WP Mail SMTP must be properly configured.

### Access WP Mail SMTP Settings
1. Go to **WP Mail SMTP** → **Settings**
2. Configure the following:

### Recommended Settings

#### General Tab
- **From Email**: `noreply@trinityhealth.co.zm`
- **From Name**: `Trinity Health Zambia`
- **Force From Email**: ✅ Checked
- **Force From Name**: ✅ Checked
- **Return Path**: ✅ Checked

#### Mailer Selection
Choose one of the following options based on your hosting:

**Option 1: Default (PHP Mail)** - Simplest but may have deliverability issues
- Select "Default (PHP Mail)"
- No additional configuration needed
- **Note**: Emails may end up in spam

**Option 2: SMTP (Recommended)** - Best deliverability
- Select "Other SMTP"
- **SMTP Host**: Get from your hosting provider
- **Encryption**: TLS or SSL
- **SMTP Port**: 587 (TLS) or 465 (SSL)
- **SMTP Username**: Your email account
- **SMTP Password**: Your email password

**Option 3: SendGrid/Mailgun** - Professional solution
- Sign up for SendGrid or Mailgun
- Get API key
- Select the service and enter API key
- Follow plugin's setup wizard

### Test Email
1. Go to **WP Mail SMTP** → **Email Test**
2. Enter your email address
3. Click "Send Email"
4. Check if you receive the test email
5. If not received, check:
   - Spam folder
   - SMTP settings
   - Email logs for errors

---

## 🔍 Troubleshooting

### Form Not Displaying
**Issue**: Form doesn't appear on the page

**Solution**:
1. Check if Contact Form 7 plugin is active
   ```bash
   ddev exec wp plugin list
   ```
2. Verify shortcode ID matches:
   ```bash
   ddev exec wp post list --post_type=wpcf7_contact_form
   ```
3. Clear browser cache and hard refresh (Cmd+Shift+R)

### Emails Not Sending
**Issue**: Form submits but no emails received

**Solution**:
1. Check WP Mail SMTP logs:
   - Dashboard → WP Mail SMTP → Email Log
2. Verify email configuration in CF7:
   - Contact → Contact Forms → [Form Name] → Mail tab
3. Test SMTP connection:
   - WP Mail SMTP → Email Test
4. Check spam folder
5. Verify hosting allows outbound email

### Form Validation Errors
**Issue**: Fields show errors when they shouldn't

**Solution**:
1. Check field names match in Form and Mail tabs
2. Verify required fields have `*` in field definition
3. Check email field uses `[email*...]` syntax

### Styling Issues
**Issue**: Form doesn't match site design

**Solution**:
1. Inspect element in browser (Right-click → Inspect)
2. Find CSS classes being used
3. Update styles in the template file:
   - `front-page.php` for home page form
   - `page-contact.php` for contact page form
   - `footer.php` for newsletter form

---

## 📋 Quick Reference Commands

### Via WP-CLI (in DDEV)

```bash
# List all CF7 forms
ddev exec wp post list --post_type=wpcf7_contact_form --format=table

# Get form content
ddev exec wp post get 303 --field=post_content

# Update form (if needed in future)
ddev exec wp eval-file setup-cf7-forms.php

# Update email settings
ddev exec wp eval-file update-cf7-emails.php

# Check plugin status
ddev exec wp plugin list | grep contact-form-7

# Check admin email
ddev exec wp option get admin_email
```

---

## 🎨 Customization Tips

### Adding New Fields
To add fields to the contact form:

1. Go to **Contact** → **Contact Forms** → **Trinity Health Contact Form**
2. Click **Form** tab
3. Use the form field generator buttons above the form editor
4. Or manually add field code, for example:
   ```
   [tel your-phone placeholder "Phone Number"]
   ```
5. Update the **Mail** tab to include the new field:
   ```
   Phone: [your-phone]
   ```
6. Click **Save**

### Common Field Types
- `[text* field-name]` - Text field (required)
- `[email* field-name]` - Email field (required)
- `[tel field-name]` - Phone field
- `[textarea field-name]` - Multi-line text
- `[select field-name "Option 1" "Option 2"]` - Dropdown
- `[checkbox field-name "Checkbox label"]` - Checkbox
- `[radio field-name "Option 1" "Option 2"]` - Radio buttons
- `[file field-name]` - File upload
- `[submit "Button Text"]` - Submit button

---

## 📱 Mobile Responsiveness

All forms are fully responsive and tested on:
- Desktop (1920px+)
- Tablet (768px - 1024px)
- Mobile (320px - 767px)

The styling automatically adapts using Tailwind CSS classes and custom media queries.

---

## 🔐 Security

### Spam Protection
Contact Form 7 Honeypot plugin is already installed and active. This provides invisible spam protection without CAPTCHAs.

### Additional Security (Optional)
Consider adding:
- **reCAPTCHA**: Google's bot protection
- **Akismet**: Spam filtering service

To add reCAPTCHA:
1. Get API keys from Google reCAPTCHA
2. Go to **Contact** → **Integration**
3. Click "reCAPTCHA" and enter keys
4. Add `[recaptcha]` to your form

---

## 📞 Support

### CF7 Documentation
- Official Docs: https://contactform7.com/docs/
- FAQ: https://contactform7.com/faq/

### Common Issues
- Form tags: https://contactform7.com/tag-syntax/
- Mail configuration: https://contactform7.com/setting-up-mail/
- Validation: https://contactform7.com/validation/

### Getting Help
If you encounter issues:
1. Check the troubleshooting section above
2. Review Contact Form 7 documentation
3. Check WP Mail SMTP logs
4. Contact your hosting provider for email delivery issues

---

## 🚀 Deployment Checklist

When deploying to production, ensure:

- [ ] WP Mail SMTP is configured with production credentials
- [ ] Email recipient is `info@trinityhealth.co.zm`
- [ ] Send test email from WP Mail SMTP
- [ ] Submit test form and verify email receipt
- [ ] Test newsletter subscription
- [ ] Check auto-reply emails are being sent
- [ ] Verify emails don't go to spam
- [ ] Test on mobile devices
- [ ] Clear all caches (site, browser, CDN)

---

## 📝 Summary

**Forms Created**: 2 (Contact Form + Newsletter)
**Email Recipient**: info@trinityhealth.co.zm
**Pages Updated**: 3 (Home, Contact, Footer)
**Status**: ✅ Ready to use

All forms are now functional and styled to match your Trinity Health brand. Simply configure WP Mail SMTP in production and you're good to go!

For any questions or modifications, refer to this guide or the Contact Form 7 documentation.
