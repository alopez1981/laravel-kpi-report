# 📊 Laravel KPI Report

Generador de informes dinámicos con KPIs clave (seguimiento del método, aptos, devoluciones, etc.) para autoescuelas.  
Permite filtrar por autoescuela y año, visualizar los datos en tabla y exportarlos a PDF profesional con estilo
corporativo.

![Captura PDF](./public/images/demo-pdf-preview.png)

---

## 🚀 Funcionalidades actuales

- ✅ Filtro por autoescuela y año
- ✅ Visualización web con tabla responsive
- ✅ Exportación a PDF con estilo personalizado (logo, colores, pie de página)
- ✅ Datos simulados por centro y mes (migración + seeder)
- ✅ Separación de lógica en servicio (`ReportService`)
- ✅ Preparado para nuevos KPIs

---

## ⚙️ Requisitos

- PHP 8.1+
- Laravel 10+
- MySQL / MariaDB
- Composer
- [DomPDF](https://github.com/barryvdh/laravel-dompdf) instalado (`composer require barryvdh/laravel-dompdf`)

---

## 🛠 Instalación

```bash
git clone git@github.com:alopez1981/laravel-kpi-report.git
cd laravel-kpi-report
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
