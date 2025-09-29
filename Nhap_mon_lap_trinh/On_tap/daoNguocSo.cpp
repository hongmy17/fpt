#include <stdio.h>

void daoNguocSo(int number) {
    int donVi = number % 10;
    int chuc = number % 100 / 10;
    int tram = number % 1000 / 100;

    int max = donVi > chuc ? donVi : chuc;
    max = max > tram ? max : tram;

    int min = donVi < chuc ? donVi : chuc;
    min = min < tram ? min : tram;

    int rest;
    if (donVi > min && donVi < max) rest = donVi;
    else if (chuc > min && chuc < max) rest = chuc;
    else rest = tram;

    printf("So dao nguoc cua %d theo thu tu tang dan la: %d%d%d\n", number, min, rest, max);
}

int main() {
    int n;
    printf("Moi nhap so n(100 -> 999): ");
    scanf("%d", &n);

    daoNguocSo(n);
    return 0;
}