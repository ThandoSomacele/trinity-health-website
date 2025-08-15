#!/usr/bin/env node

const chokidar = require('chokidar');
const { exec } = require('child_process');
const path = require('path');

console.log('🚀 Starting Trinity Health hot reload watcher...');

// Watch PHP files for Tailwind changes
const phpWatcher = chokidar.watch('./**/*.php', {
  ignored: ['**/node_modules/**', '**/build/**', '**/vendor/**'],
  persistent: true
});

// Watch build files for browser reload
const buildWatcher = chokidar.watch('./build/**/*.{css,js}', {
  persistent: true
});

let building = false;

phpWatcher.on('change', (filePath) => {
  if (building) return;
  
  console.log(`📄 PHP file changed: ${filePath}`);
  console.log('🔄 Rebuilding CSS with Tailwind...');
  
  building = true;
  
  // Use DDEV to run the build
  exec('ddev npm run build', (error, stdout, stderr) => {
    building = false;
    
    if (error) {
      console.error('❌ Build failed:', error);
      return;
    }
    
    console.log('✅ CSS rebuilt successfully');
    console.log('🔄 Browser will reload automatically...');
  });
});

buildWatcher.on('change', (filePath) => {
  console.log(`📦 Build file changed: ${filePath}`);
});

phpWatcher.on('ready', () => {
  console.log('👁️  Watching PHP files for Tailwind changes...');
});

buildWatcher.on('ready', () => {
  console.log('👁️  Watching build files...');
});

process.on('SIGINT', () => {
  console.log('\n👋 Stopping watchers...');
  phpWatcher.close();
  buildWatcher.close();
  process.exit(0);
});