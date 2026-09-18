import 'package:flutter/material.dart';
import 'widgets/tarjeta_medicamento.dart';

void main() {
  runApp(const RememberMeApp());
}

class RememberMeApp extends StatelessWidget {
  const RememberMeApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Remember Me',
      theme: ThemeData(
        primarySwatch: Colors.teal,
        scaffoldBackgroundColor: const Color(0xFFF8FAFC),
      ),
      home: const PantallaPrincipal(),
    );
  }
}

class PantallaPrincipal extends StatelessWidget {
  const PantallaPrincipal({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Remember Me - Panel de Control', style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold)),
        backgroundColor: const Color(0xFF0D9488),
        elevation: 0,
        actions: [
          IconButton(
            icon: const Icon(Icons.notifications_active, color: Colors.white),
            onPressed: () {
              ScaffoldMessenger.of(context).showSnackBar(
                const SnackBar(content: Text('Notificaciones OneSignal activas')),
              );
            },
          ),
        ],
      ),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(20.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            // Widget de Saludo
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: const [
                    Text(
                      'Hola, Paciente 👋',
                      style: TextStyle(fontSize: 24, fontWeight: FontWeight.bold, color: Color(0xFF0F172A)),
                    ),
                    SizedBox(height: 4),
                    Text(
                      'Tus próximas tomas programadas para hoy:',
                      style: TextStyle(color: Colors.grey, fontSize: 14),
                    ),
                  ],
                ),
                Container(
                  padding: const EdgeInsets.symmetric(horizontal: 12, vertical: 6),
                  decoration: BoxDecoration(
                    color: Colors.teal.shade50,
                    borderRadius: BorderRadius.circular(20),
                    border: Border.all(color: Colors.teal.shade200),
                  ),
                  child: const Text(
                    '🟢 Sistema Seguro',
                    style: TextStyle(color: Color(0xFF0D9488), fontWeight: FontWeight.bold, fontSize: 12),
                  ),
                ),
              ],
            ),
            const SizedBox(height: 20),

            // Tarjeta de Progreso Diario
            Container(
              padding: const EdgeInsets.all(16),
              decoration: BoxDecoration(
                color: Colors.white,
                borderRadius: BorderRadius.circular(16),
                boxShadow: [
                  BoxShadow(color: Colors.black.withOpacity(0.03), blurRadius: 10, offset: const Offset(0, 4)),
                ],
              ),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  const Text('Progreso de cumplimiento', style: TextStyle(fontWeight: FontWeight.bold, color: Color(0xFF0F172A))),
                  const SizedBox(height: 10),
                  LinearProgressIndicator(
                    value: 0.66,
                    backgroundColor: Colors.grey.shade200,
                    color: const Color(0xFF0D9488),
                    minHeight: 8,
                  ),
                  const SizedBox(height: 8),
                  const Text('2 de 3 medicamentos tomados a tiempo hoy', style: TextStyle(color: Colors.grey, fontSize: 12)),
                ],
              ),
            ),
            const SizedBox(height: 25),

            const Text(
              'Medicamentos Activos',
              style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold, color: Color(0xFF0F172A)),
            ),
            const SizedBox(height: 12),

            // Tarjetas de Medicamentos
            const TarjetaMedicamento(
              nombre: 'Amoxicilina 500mg',
              dosis: 'Dosis: 1 Tableta - Con alimentos',
              hora: '08:00 AM',
              colorBorde: Color(0xFF0D9488),
            ),
            const TarjetaMedicamento(
              nombre: 'Ibuprofeno 200mg',
              dosis: 'Dosis: 1 Cápsula - Para el dolor',
              hora: '02:00 PM',
              colorBorde: Color(0xFFF59E0B),
            ),
            const TarjetaMedicamento(
              nombre: 'Losartán 50mg',
              dosis: 'Dosis: 1 Tableta en ayunas',
              hora: '06:00 PM',
              colorBorde: Color(0xFF64748B),
            ),
          ],
        ),
      ),
      floatingActionButton: FloatingActionButton.extended(
        onPressed: () {
          ScaffoldMessenger.of(context).showSnackBar(
            const SnackBar(content: Text('Función para agregar nuevo medicamento')),
          );
        },
        backgroundColor: const Color(0xFF0D9488),
        icon: const Icon(Icons.add, color: Colors.white),
        label: const Text('Nuevo Medicamento', style: TextStyle(color: Colors.white)),
      ),
    );
  }
}