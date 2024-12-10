import numpy as np
import pandas as pd
from sklearn.linear_model import LinearRegression
from datetime import datetime
import sys

def konversi_ke_hari(tanggal):
    return (tanggal - datetime(tanggal.year, 1, 1)).days + 1

# Data pengunjung bulanan
data = {
    'Bulan': [2, 3],
    'Pengunjung': [253, 536]  # Data untuk bulan Februari dan Maret
}

# Input dari Laravel (misalnya tanggal dan faktor cuaca)
tanggal_prediksi_str = sys.argv[1]  # Format: YYYY-MM-DD
cuaca_cerah = sys.argv[2]  # Faktor cuaca cerah

tanggal_prediksi = datetime.strptime(tanggal_prediksi_str, '%Y-%m-%d')

# Konversi ke DataFrame
df = pd.DataFrame(data)

hari_dalam_bulan = []
pengunjung_bulanan = []

for i, row in df.iterrows():
    bulan = row['Bulan']
    pengunjung = row['Pengunjung']
    hari_rata_rata = pd.Period(f'2024-{bulan}').days_in_month / 2
    hari_dalam_bulan.append(konversi_ke_hari(datetime(2024, bulan, int(hari_rata_rata))))
    pengunjung_bulanan.append(pengunjung)

df_harian = pd.DataFrame({
    'Hari': hari_dalam_bulan,
    'Pengunjung_Bulanan': pengunjung_bulanan
})

X = df_harian[['Hari']]
y = df_harian['Pengunjung_Bulanan']

model = LinearRegression()
model.fit(X, y)

hari_ke = konversi_ke_hari(tanggal_prediksi)
prediksi_pengunjung = model.predict(np.array([[hari_ke]]))

faktor_cuaca = 1.1 if cuaca_cerah == 'cerah' else 1.0
prediksi_dengan_cuaca = prediksi_pengunjung[0] * faktor_cuaca

print(f'{prediksi_dengan_cuaca:.2f}')
