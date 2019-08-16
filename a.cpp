#include<stdlib.h>
#include<stdio.h>
#include<vector>

using namespace std;
int main()
{
    FILE *f1=fopen("lab3","r");
    freopen("a.out","w",stdout);
    char c;
    vector<unsigned int> vec;
    while(fscanf(f1,"%c",&c)!=EOF)
    {
        vec.push_back((unsigned char) c);
    }
    for(int i=0;i<0x400;i++)
            printf("00\n");
    for(int i=0;i<vec.size();i++)
    {
        printf("%.2x\n",vec[i]);
    }
    //system("pause");
}
