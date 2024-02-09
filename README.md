# Imagely

WordPress plugin for compressing images on upload.
Plugin sends images to an instance of [https://github.com/KomelT/media-converter-api](https://github.com/KomelT/media-converter-api) which returns back compressed size.

## Development

Git clone plugin and start development instance of WordPress

```bash
git clone https://github.com/KomelT/Imagely.git
cd Imagely
docker compose -f docker-compose.dev.yaml up
```

### Build

Script fetches version of plugin from `src/imagely.php` and creates a zip file `imagely-{version}.zip` with content of `src` folder.

```bash
chmod +x ./scripts/build.sh
yarn run build
```

## Changelog

**1.0.0**

- Added **compress on upload**
- Added **plugins admin settings page**
