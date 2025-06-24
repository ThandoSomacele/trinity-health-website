# Trinity Health Deployment - Quick Reference

## 🚀 Quick Deploy Commands

### First Time Setup
```bash
# 1. Configure FTP (one-time setup)
cp ftp-config.example.sh ftp-config.sh
nano ftp-config.sh  # Add your hosting details

# 2. Build and deploy
source ftp-config.sh && ./build-production.sh --deploy
```

### Regular Deployments
```bash
# After making changes to your site
source ftp-config.sh && ./build-production.sh --deploy
```

---

## 📋 Command Cheatsheet

| Task | Command |
|------|---------|
| **View help** | `./build-production.sh --help` |
| **Build only** | `./build-production.sh` |
| **Build + Deploy** | `./build-production.sh --deploy` |
| **Start DDEV** | `ddev start` |
| **Build theme assets** | `ddev exec --dir=/var/www/html/web/app/themes/trinity-health npm run build` |
| **Export database** | `ddev wp db export backup.sql` |

---

## 🔧 Common Hosting Configurations

### Afrihost / cPanel
```bash
FTP_HOST="ftp.yourdomain.co.za"
FTP_USER="username@yourdomain.co.za"
FTP_REMOTE_PATH="/public_html"
```

### Hetzner VPS
```bash
FTP_HOST="your-server-ip"
FTP_USER="root"
FTP_REMOTE_PATH="/var/www/html"
```

### SiteGround
```bash
FTP_HOST="ftp.yourdomain.com"
FTP_USER="cpanel-username"
FTP_REMOTE_PATH="/public_html"
```

---

## 🚨 Quick Troubleshooting

| Problem | Solution |
|---------|----------|
| **"lftp not found"** | `brew install lftp` |
| **"Requirements check failed"** | `ddev start && ddev wp core is-installed` |
| **"Theme assets not built"** | `cd web/app/themes/trinity-health && ddev exec npm run build` |
| **"FTP connection failed"** | Check credentials in `ftp-config.sh` |
| **"Database import error"** | Use phpMyAdmin in hosting control panel |

---

## 📁 File Structure After Build

```
dist-production/
├── wp-content/
│   ├── themes/trinity-health/     # ← Upload this
│   ├── plugins/                   # ← Upload this  
│   └── uploads/                   # ← Upload this
├── database-export.sql            # ← Import this
└── import-database.txt            # ← Read this
```

---

## ✅ Post-Deploy Checklist

- [ ] Import `database-export.sql` via phpMyAdmin
- [ ] Activate Trinity Health theme in WordPress admin
- [ ] Update site URLs if domain changed
- [ ] Test homepage, navigation, and contact forms
- [ ] Verify SSL certificate is working

---

## 🔗 Useful Links

- **WordPress Admin:** `https://yourdomain.com/wp-admin`
- **Generate Security Keys:** https://api.wordpress.org/secret-key/1.1/salt/
- **phpMyAdmin:** Usually in hosting control panel
- **Full Documentation:** [DEPLOYMENT-GUIDE.md](./DEPLOYMENT-GUIDE.md)

---

**💡 Pro Tip:** Always test changes locally with `ddev start` before deploying to production!